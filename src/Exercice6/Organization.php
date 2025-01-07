<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class Organization implements OrganizationUnit
{
    public function getName(): string
    {
        return $this->name;
    }
}
