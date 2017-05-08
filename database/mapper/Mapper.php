<?php
namespace database\mapper;

abstract class Mapper
{
    protected static $PDO;

    public function __construct()
    {
        if(!isset(self::$PDO)) {
            //$dsn = \database\base\ApplicationRegistry::getDSN();
            $dsn = 'mysql:dbname=venue;host=localhost';
            $user = 'root';
            $password = 'gainward';
            if(is_null($dsn)) {
                throw new \database\base\AppException("Brak DSN");
            }
            self::$PDO = new \PDO($dsn, $user, $password);
            self::$PDO->setAttribute(
                \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
    }

    public function findAll()
    {
        $this->selectAllStmt->execute(array());
        return $this->getCollection(
            $this->selectAllStmt->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function find($id)
    {
        $this->selectStmt->execute(array($id));
        $array = $this->selectStmt->fetch();
        $this->selectStmt()->closeCursor();
        if(!is_array($array)) {return null;}
        if(!isset($array['id'])) {return null;}
        $object = $this->createObject($array);
        return $object;
    }

    public function createObject($array)
    {
        $obj = $this->doCreateObject($array);
        return $obj;
    }

    public function insert(\database\domain\DomainObject $obj)
    {
        $this->doInsert($obj);
    }

    abstract function update(\database\domain\DomainObject $object);
    protected abstract function doCreateObject(array $array);
    protected abstract function doInsert(\database\domain\DomainObject $object);
    protected abstract function selectStmt();
}
