<?php

namespace App\TestBundle\Entity;

/**
 * Class ExtraSourceConfig
 * @package App\Test\Entity
 */
class ExtraSourceConfig extends SourceConfigType
{
    /**
     *
     */
    const TYPE = 'Extra';

    /**
     * @var string
     */
    private $businessName;

    /**
     * @var string
     */
    private $businessId;

    /**
     * ExtraSourceConfig constructor.
     */
    public function __construct()
    {
        $this->type = self::TYPE;
    }

    /**
     * @return string
     */
    public function getBusinessName(): string
    {
        return $this->businessName;
    }

    /**
     * @param string $businessName
     */
    public function setBusinessName(string $businessName)
    {
        $this->businessName = $businessName;
    }

    /**
     * @return string
     */
    public function getBusinessId(): string
    {
        return $this->businessId;
    }

    /**
     * @param string $businessId
     */
    public function setBusinessId(string $businessId)
    {
        $this->businessId = $businessId;
    }
}
