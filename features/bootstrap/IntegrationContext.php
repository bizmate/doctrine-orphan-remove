<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\EntityManager ;
USE App\TestBundle\Entity\LiveConfig;
use App\TestBundle\Entity\MainSourceConfig;
use App\TestBundle\Entity\ExtraSourceConfig;


/**
 * Defines application features from the specific context.
 */
class IntegrationContext implements Context
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * string - temporary way to pass in environment context
     */
    protected $env;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(EntityManager $entityManager, $env='test')
    {
        $this->entityManager = $entityManager;
        $this->env = $env;
    }

    /** @BeforeScenario */
    public function beforeScenario($event)
    {
        $this->getEntityManager()->clear();
        $this->buildSchema();
        //$this->loadFixtures();
    }

    /** @AfterScenario */
    public function afterScenario($event)
    {
        //$this->getEntityManager()->clear();
    }

    /**
     *
     */
    protected function buildSchema()
    {
        $metadata = $this->getMetadata();
        if (!empty($metadata)) {
            $tool = new SchemaTool($this->getEntityManager());
            $tool->dropSchema($metadata);
            $tool->createSchema($metadata);
        }
    }

    /**
     * @return array
     */
    protected function getMetadata()
    {
        return $this->getEntityManager()->getMetadataFactory()->getAllMetadata();
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @Given I have SiteConfig
     */
    public function iHaveSiteconfig(TableNode $table)
    {
        $siteConfig = new LiveConfig();
        $extraSourceConfig = new ExtraSourceConfig();
        $mainSourceConfig = new MainSourceConfig();
        $mainId = null;
        $extraId = null;
        $em = $this->entityManager;

        foreach ($table as $row) {
            //echo 'Setting field ' . $row['field'] . ' with val ' . $row['value'];
            switch ($row['field']) {
                case 'url':
                    $siteConfig->setUrl($row['value']);
                    break;
                case 'uuid':
                    $siteConfig->setUuid($row['value']);
                    break;
                case 'mainId':
                    $mainSourceConfig->setPlaceId($row['value']);
                    $mainId = $row['value'];
                    break;
                case 'mainName':
                    $mainSourceConfig->setPlaceName($row['value']);
                    break;
                case 'extraId':
                    $extraSourceConfig->setBusinessId($row['value']);
                    $extraId = $row['value'];
                    break;
                case 'extraName':
                    $extraSourceConfig->setBusinessName($row['value']);
                    break;
                default:
                    throw new \LogicException('Could not find field ' . $row['field'] . ' for Site Config field.');
                    break;
            }
        }

        //echo MainSourceConfig::class; die;
        if($mainConfExist = $em->getRepository(MainSourceConfig::class)->findOneBy(array('placeId' => $mainId))) {
            $mainSourceConfig = $mainConfExist;
        }
        $siteConfig->setMainSourceConfig($mainSourceConfig);
        if($extraConfExist = $em->getRepository(ExtraSourceConfig::class)->findOneBy(array('businessId' => $extraId))) {
            $extraSourceConfig = $extraConfExist;
        }
        $siteConfig->setExtraSourceConfig($extraSourceConfig);
        $siteConfig->setCreatedAt(new DateTime());
        $siteConfig->setUpdatedAt(new DateTime());
        $em->persist($siteConfig);
        $em->flush();
    }

    /**
     * @When I delete site config with url :siteUrl
     */
    public function iDeleteSite($siteUrl)
    {
        $liveConfig = $this->entityManager->getRepository(LiveConfig::class)->findOneBy(array('url' => $siteUrl));
        if($liveConfig === null){
            throw new LogicException('Site with url ' . $siteUrl . ' not found ');
        }
        $this->entityManager->remove($liveConfig);
        $this->entityManager->flush();
    }

    /**
     * @Then I can find entity :entityName with id :id
     */
    public function iCanFindEntityWithId($entityName, $id)
    {
        $entity = $this->findEntity($entityName, 'placeId', $id);

        if($entity === null)
        {
            throw new LogicException('Entity ' . $entityName . ' with id ' .  $id . ' not found ');
        }
    }

    /**
     * @Then I cannot find entity :entityName with id :id
     */
    public function iCannotFindEntityWithId($entityName, $id)
    {
        $entity = $this->findEntity($entityName, 'placeId', $id);

        if($entity !== null)
        {
            throw new LogicException('Entity ' . $entityName . ' with id ' .  $id . ' still present ');
        }
    }

    private function findEntity($entityName, $attrName, $value)
    {
        $className = 'App\TestBundle\Entity\\' . $entityName;

        return $this->entityManager->getRepository($className)->findOneBy(array($attrName => $value));
    }
}
