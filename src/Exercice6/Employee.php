<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Employee implements OrganizationUnit
{
    private int $id;
    private string $name;
    private string $jobTitle;

    public function __construct(int $id, string $name, string $jobTitle)
    {
        $this->id = $id;
        $this->name = str_starts_with($name, 'Employee') ? $name : 'Employee ' . $name;
        $this->jobTitle = str_starts_with($jobTitle, 'Job title') ? $jobTitle : 'Job title ' . $jobTitle;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    public function displayDetails(int $indentation = 0): string
    {
        $indent = str_repeat("    ", $indentation);
        return sprintf(
            "%sEmployee ID : %d\r\n%sEmployee name : %s\r\n%sEmployee job title : %s\r\n\r\n",
            $indent,
            $this->id,
            $indent,
            $this->name,
            $indent,
            $this->jobTitle
        );
    }
}
