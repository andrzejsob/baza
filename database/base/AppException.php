<?php
namespace database\base;

class AppException extends \Exception
{
    function __constuct($message)
    {
        parent::__construct($message);
    }
}
