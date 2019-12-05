<?php

class Product{

    private $id;
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $createdAt;
    private $updatedAt;
    private $brandId;
    private $categoryId;
    private $typeId;

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

    public function getDescription()
    {
        return $this->description;
    } 

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPicture()
    {
        return $this->picture;
    } 

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getPrice()
    {
        return $this->price;
    } 

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getRate()
    {
        return $this->rate;
    } 

    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    public function getStatus()
    {
        return $this->status;
    } 

    public function setStatus($status)
    {
        $this->status = $status;
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

    public function getBrandId()
    {
        return $this->brandId;
    } 

    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    } 

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getTypeId()
    {
        return $this->typeId;
    } 

    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

}