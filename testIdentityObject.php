<?php
require_once "vendor/autoload.php";

$vio = new \database\mapper\IdentityObject();
$vio->field('name')->eq('test')->lt('cos')->field('date')->gt('2017');
//$vsf = new VenueSelectionFactory();
//print_r($vio);
print_r($vio->getComps());
foreach ($vio->getComps() as $comp) {
    $compstrings[] = $comp['name'].' '.$comp['operator'].' ?';
    $values[] = $comp['value'];
}
print_r($compstrings);
print_r($values);
