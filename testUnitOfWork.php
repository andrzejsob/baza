<?php
require_once "vendor/autoload.php";

$venue = new \database\domain\Venue(null, "Na stole");

\database\domain\ObjectWatcher::instance()->performOperations();
