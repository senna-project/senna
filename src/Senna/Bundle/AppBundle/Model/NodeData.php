<?php

namespace Senna\Bundle\AppBundle\Model;

class NodeData extends Timestampable
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var data
     */
    protected $data;

    /**
     * @var integer
     */
    protected $node;

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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param name $data
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return int
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * @param Node node
     * @return self
     */
    public function setNode($node)
    {
        $this->node = $node;
        return $this;
    }

    /**
     * @return \DateTime createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime createdAt
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return self
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return updatedAt
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     * @return self
     */
    public function setDeletedAt(\DateTime $deletedAt)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }
}