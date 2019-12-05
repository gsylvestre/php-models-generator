<?php

class Brand{

    private $id;
    private $name;
    private $footerOrder;
    private $createdAt;
    private $updatedAt;

    public function getId()
    {
        return $this->id;
    } 

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    } 

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getFooterOrder()
    {
        return $this->footerOrder;
    } 

    public function setFooterOrder($footerOrder)
    {
        $this->footerOrder = $footerOrder;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    } 

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    } 

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

}