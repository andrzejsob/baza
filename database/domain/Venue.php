<?php
namespace database\domain;

class Venue extends DomainObject
{
    private $name;
    private $spaces;

    public function __construct($id = null, $name = null)
    {
        $this->name = $name;
        $this->spaces =
                self::getCollection("\\database\\domain\\Space");
        parent::__construct($id);
    }

    public function setSpaces(SpaceCollection $spaces)
    {
        $this->spaces = $spaces;
    }

    public function getSpaces()
    {
        return $this->spaces;
    }

    public function addSpace(Space $space)
    {
        $this->spaces->add($space);
        $space->setVenue($this);
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

    public function markDirty()
    {

    }
}
