<?php

namespace Senna\Bundle\AppBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Node extends Timestampable implements NodeInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var name
     */
    protected $name;

    /**
     * @var name
     */
    protected $code;

    /**
     * @var integer
     */
    protected $active;

    /**
     * @var
     */
    protected $data;

    /**
     * @var createdAt
     */
    protected $createdAt;

    /**
     * @var updatedAt
     */
    protected $updatedAt;

    /**
     * @var updatedAt
     */
    protected $deletedAt;

    public function __construct()
    {
        $this->data = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param name $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param int $active
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @param $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return name
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }
}