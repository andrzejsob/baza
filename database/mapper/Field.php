<?php
namespace database\mapper;

class Field
{
    protected $name = null;
    protected $operator = null;
    protected $comps = [];
    protected $incomplete = false;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addTest($operator, $value)
    {
        $this->comps[] = array(
            'name' => $this->name,
            'operator' => $operator,
            'value' => $value
        );
    }

    public function getComps()
    {
        return $this->comps;
    }

    public function isIncomplete()
    {
        return empty($this->comps);
    }
}
