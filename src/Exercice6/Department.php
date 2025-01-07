<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Department implements OrganizationUnit
{
    private int $id;
    private string $name;
    private array $units = [];

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        if (preg_match('/^\d+\.\d+$/', $name)) {
            $this->name = 'Department ' . $name;
        } else {
            $this->name = str_starts_with($name, 'Department') ? $name : 'Department ' . $name;
        }
    }

    public function getId(): int
    {
        return $this->id;
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
            $this->units = array_values($this->units);
        }
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat("    ", $indentation);
        $result = sprintf(
            "%sDepartment ID : %d\r\n%sDepartment name : %s\r\n%sDepartment details :\r\n\r\n",
            $indent,
            $this->id,
            $indent,
            $this->name,
            $indent
        );

        foreach ($this->units as $unit) {
            $result .= $unit->displayDetails($indentation + 1);
        }

        return $result;
    }
}
