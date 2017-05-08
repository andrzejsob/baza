<?php
namespace database\domain;

interface VenueCollection extends \Iterator
{
    function add(DomainObject $venue);
}
