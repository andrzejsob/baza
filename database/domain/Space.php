<?php
namespace database\domain;

class Space extends DomainObject
{
    private $id;
    private $name;
    private $venue;

    public function __construct($id = null, $name)
    {
        $this->name = $name;
        parent::__construct($id);
    }

    public function setName($name_s)
    {
        $this->name = $name_s;
        $this->markDirty();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setVenue(Venue $venue)
    {
        $this->venue = $venue;
        $this->markDirty();
    }

    public function getVenue()
    {
        return $this->venue;
    }
}
