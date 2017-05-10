<?php
ini_set('display_errors', 1);
require "vendor/autoload.php";

use database\mapper as mapper;
//woo\controller\Controller::run();
$mapper = new mapper\VenueMapper();
$v_collection = $mapper->findAll();
foreach($v_collection as $venue) {
    echo $venue->getId().' -> '.$venue->getName().'</br>';
}
print_r(Space::class);

$iobj = new mapper\IdentityObject();
$iobj->field('name')->gt('Coś tam')->lt('nowe');
//$iobj->getComps();
echo '<pre>';
print_r($iobj->getComps());
echo '</pre>';
