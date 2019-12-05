<?php

class Category{

    private $id;
    private $name;
    private $subtitle;
    private $picture;
    private $homeOrder;
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

    public function getSubtitle()
    {
        return $this->subtitle;
    } 

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function getPicture()
    {
        return $this->picture;
    } 

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getHomeOrder()
    {
        return $this->homeOrder;
    } 

    public function setHomeOrder($homeOrder)
    {
        $this->homeOrder = $homeOrder;
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