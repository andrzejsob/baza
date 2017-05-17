<?php
require_once "vendor/autoload.php";

$vm = new \database\mapper\VenueMapper();

$coll = $vm->findAll();

foreach ($coll as $venue) {
    echo $venue->getName()."\n";
}
