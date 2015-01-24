<?php

namespace Senna\Bundle\AppBundle\Model;

class Room extends Timestampable implements RoomInterface
{
    protected $id;
    protected $name;
    protected $description;

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


    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
}