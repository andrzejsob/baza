<?php
namespace database\mapper;

class VenueMapper extends Mapper
{
    public function __construct()
    {
        parent::__construct();
        $this->selectAllStmt = self::$PDO->prepare(
            'SELECT * FROM venue');
        $this->selectStmt = self::$PDO->prepare(
            "SELECT * FROM venue WHERE id = ?");
        $this->updateStmt = self::$PDO->prepare(
            "UPDATE venue SET name = ? WHERE id = ?");
        $this->insertStmt = self::$PDO->prepare(
            "INSERT INTO venue(name) VALUES (?)");
    }

    public function getCollection(array $raw)
    {
        return new VenueCollection($raw, $this);
    }

    protected function doCreateObject(array $venue)
    {
        $obj = new \database\domain\Venue($venue['id'], $venue['name']);
        //$obj->setName($array['name']);
        return $obj;
    }

    protected function doInsert(\database\domain\DomainObject $object)
    {
        $values = array($object->getName());
        $this->insertStmt->execute($values);
        $id = self::$PDO->lastInsertId();
        $object->setId($id);
    }

    public function update(\database\domain\DomainObject $object)
    {
        $values = array($object->getName(), $object->getId());
        $this->updateStmt->execute($values);
    }

    public function selectStmt()
    {
        return $this->selectStmt;
    }
}
