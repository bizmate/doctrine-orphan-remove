<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 04/07/17
 * Time: 21:18
 */

namespace App\TestBundle\Entity;

/**
 * Class SourceConfigType
 * @package App\TestBundle\Entity
 */
abstract class SourceConfigType
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var
     */
    protected $type;

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
    public function getType()
    {
        return $this->type;
    }
}
