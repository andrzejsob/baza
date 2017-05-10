<?php
namespace database\domain;

class HelperFactory
{
    public static function getCollection($class)
    {
        //$collection = '\\'$class.'Collection';
        $class = preg_replace('/^.*\\\/', "", $class);
        $collection = '\\database\\mapper\\'.$class.'Collection';
        if (class_exists($collection)) {
            return new $collection();
        }
    }
}
