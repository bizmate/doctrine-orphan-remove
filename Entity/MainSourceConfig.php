<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 04/07/17
 * Time: 21:20
 */

namespace App\TestBundle\Entity;

/**
 * Class MainSourceConfig
 * @package App\Test\Entity
 */
class MainSourceConfig extends SourceConfigType
{
    /**
     *
     */
    const TYPE = 'Main';

    /**
     * @var string
     */
    private $placeId;

    /**
     * @var string
     */
    private $placeName;

    /**
     * MainSourceConfig constructor.
     */
    public function __construct()
    {
        $this->type = self::TYPE;
    }

    /**
     * @return string
     */
    public function getPlaceId(): string
    {
        return $this->placeId;
    }

    /**
     * @param string $placeId
     */
    public function setPlaceId(string $placeId)
    {
        $this->placeId = $placeId;
    }

    /**
     * @return string
     */
    public function getPlaceName(): string
    {
        return $this->placeName;
    }

    /**
     * @param string $placeName
     */
    public function setPlaceName(string $placeName)
    {
        $this->placeName = $placeName;
    }
}
