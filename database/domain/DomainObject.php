<?php
namespace database\domain;

abstract class DomainObject
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    static public function getCollection($type)
    {
        return '\\database\\mapper\\'.$type.'Collection';
    }

    public function collection()
    {
        return self::getCollection(get_class($this));
    }
}
