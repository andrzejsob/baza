<?php
ini_set('display_errors', 1);
require "vendor/autoload.php";

use database\mapper\VenueMapper;
use database\mapper\IdentityObject;

//woo\controller\Controller::run();
$mapper = new VenueMapper();
/*
$v_collection = $mapper->findAll();
foreach($v_collection as $venue) {
    echo $venue->getId().' -> '.$venue->getName().'</br>';
}

$collection = \database\domain\HelperFactory::getCollection(\database\domain\Venue::class);
$collection->add(new \database\domain\Venue(null, "Coś tam"));
$collection->add(new \database\domain\Venue(null, "Nowy"));

foreach ($collection as $venue) {
    print $venue->getName().'\n';
}
*/
$venue = $mapper->find(1);
echo $venue->getId()." -> ".$venue->getName()."\n";

$venue = $mapper->find(1);
echo $venue->getId()." -> ".$venue->getName()."\n";
