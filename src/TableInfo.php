<?php

use Doctrine\Common\Inflector\Inflector;

class TableInfo 
{
    private $name;
    private $columns = [];
    private $properties = [];
    private $className;
    private $getters = [];
    private $setters = [];

    public function __construct(string $tableName)
    {
        $this->name = $tableName;

        $generator = new ModelGenerator();
        $this->columns = $generator->getTableColumns($tableName);

        $this->generateGettersFromColumns();
        $this->generateSettersFromColumns();
        $this->generateClassNameFromTableName();
        $this->generatePropertiesFromColumns();
    }

    public function generateClassNameFromTableName()
    {
        $this->className = Inflector::singularize(Inflector::classify($this->name));
    }

    public function generatePropertiesFromColumns()
    {
        foreach($this->columns as $column){
            $this->properties[] = Inflector::camelize($column);
        }
    }

    public function generateGettersFromColumns()
    {
        foreach($this->columns as $column){
            $this->getters[] = "get" . Inflector::classify($column);
        }
    }

    public function generateSettersFromColumns()
    {
        foreach($this->columns as $column){
            $this->setters[] = "set" . Inflector::classify($column);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function getClassName()
    {
        return $this->className;
    }

    public function getGetters()
    {
        return $this->getters;
    }

    public function getSetters()
    {
        return $this->setters;
    }
}