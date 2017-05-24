<?php
namespace database\mapper;

class IdentityObject
{
    protected $currentfield = null;
    protected $fields = array();
    private $and = null;
    private $enforce = array();

    public function __construct($field = null, array $enforce = null)
    {
        if (!is_null($enforce)) {
            $this->enforce = $enforce;
        }
        if (!is_null($field)) {
            $this->fields($field);
        }
    }

    public function getObjectFields()
    {
        return $this->enforce;
    }

    public function field($fieldname)
    {
        if (isset($this->fields[$fieldname])) {
            $this->currentfield = $this->fields[$fieldname];
        } else {
            $this->currentfield = new Field($fieldname);
            $this->fields[$fieldname] = $this->currentfield;
        }
        return $this;
    }

    public function eq($value)
    {
        return $this->operator('=', $value);
    }

    public function lt($value)
    {
        return $this->operator('<', $value);
    }

    public function gt($value)
    {
        return $this->operator('>', $value);
    }

    public function operator($symbol, $value)
    {
        $this->currentfield->addTest($symbol, $value);
        return $this;
    }

    public function getComps()
    {
        $comparisons = array();
        foreach ($this->fields as $field) {
            $comparisons = array_merge($comparisons, $field->getComps());
        }
        return $comparisons;
    }
}
