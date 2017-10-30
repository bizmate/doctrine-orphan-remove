<?php
namespace App\TestBundle\Entity;

/**
 * Class SiteConfig
 * @package App\TestBundle\Entity
 */
abstract class SiteConfig
{
    /**
     * @var
     */
    protected $id;
    /**
     * @var string - used to uniquely identifying the specific integration instance
     */
    protected $uuid;
    /**
     * @var MainSourceConfig main set up for this integration
     */
    protected $mainSourceConfig;
    /**
     * @var ExtraSourceConfig extra setup for this integration
     */
    protected $extraSourceConfig;
    /**
     * @var
     */
    protected $url;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param mixed $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return MainSourceConfig
     */
    public function getMainSourceConfig()
    {
        return $this->mainSourceConfig;
    }

    /**
     * @param mixed $mainSourceConfig
     */
    public function setMainSourceConfig(MainSourceConfig $mainSourceConfig)
    {
        $this->mainSourceConfig = $mainSourceConfig;
    }

    /**
     * @return ExtraSourceConfig
     */
    public function getExtraSourceConfig()
    {
        return $this->extraSourceConfig;
    }

    /**
     * @param ExtraSourceConfig $extraSourceConfig
     */
    public function setExtraSourceConfig(ExtraSourceConfig $extraSourceConfig)
    {
        $this->extraSourceConfig = $extraSourceConfig;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
