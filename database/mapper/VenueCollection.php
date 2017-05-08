<?php
namespace database\mapper;

class VenueCollection extends Collection
                       implements \database\domain\VenueCollection
{
    public function targetClass()
    {
        return '\database\domain\Venue';
    }
}
