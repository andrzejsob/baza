<?php
ini_set('display_errors', 1);

require "vendor/autoload.php";
//woo\controller\Controller::run();
$mapper = new \database\mapper\VenueMapper();
$v_collection = $mapper->findAll();
foreach($v_collection as $venue) {
    echo $venue->getId().' -> '.$venue->getName().'</br>';
}
print_r(Space::class);
