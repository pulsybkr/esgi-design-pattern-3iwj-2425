<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Organization
{
    private string $name;
    private array $units = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addOrganizationUnit(OrganizationUnit $unit): void
    {
        $this->units[] = $unit;
    }

    public function removeOrganizationUnit(OrganizationUnit $unit): void
    {
        $key = array_search($unit, $this->units, true);
        if ($key !== false) {
            unset($this->units[$key]);
        }
    }

    public function displayDetails(): string
    {
        IdGenerator::reset();
        $result = sprintf("Organization name : %s\r\nOrganization details :\r\n\r\n", $this->name);
        
        foreach ($this->units as $unit) {
            $result .= $unit->displayDetails(1);
        }
        
        return rtrim($result, "\r\n");
    }
}
