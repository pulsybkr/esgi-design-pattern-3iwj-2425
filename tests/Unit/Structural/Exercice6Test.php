<?php

use EdemotsCourses\EsgiDesignPattern\Exercice6\Department;
use EdemotsCourses\EsgiDesignPattern\Exercice6\Employee;
use EdemotsCourses\EsgiDesignPattern\Exercice6\Organization;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Exercice6Test extends TestCase
{
    #[Test]
    public function itCorrectlyDisplaysHierarchy()
    {
        $organization = new Organization('Organization');

        $department = new Department(1, 'Department 1');
        $department->addOrganizationUnit(new Employee(1, 'Employee 1', 'Job title 1'));
        $department->addOrganizationUnit(new Employee(2, 'Employee 2', 'Job title 2'));
        $organization->addOrganizationUnit($department);

        $department = new Department(2, 'Department 2');
        $department->addOrganizationUnit(new Employee(1, 'Employee 1', 'Job title 1'));
        $department->addOrganizationUnit(new Employee(2, 'Employee 2', 'Job title 2'));
        $organization->addOrganizationUnit($department);

        $expected = <<<EOL
Organization name : Organization
Organization details :

    Department ID : 1
    Department name : Department 1
    Department details :

        Employee ID : 1
        Employee name : Employee 1
        Employee job title : Job title 1

        Employee ID : 2
        Employee name : Employee 2
        Employee job title : Job title 2

    Department ID : 2
    Department name : Department 2
    Department details :

        Employee ID : 1
        Employee name : Employee 1
        Employee job title : Job title 1

        Employee ID : 2
        Employee name : Employee 2
        Employee job title : Job title 2
EOL;

        $this->assertEquals($expected, $organization->displayDetails());
    }

    #[Test]
    public function itCorrectlyDisplaysSubDepartments()
    {
        $organization = new Organization('Organization');

        $department = new Department(1, 'Department 1');
        $department->addOrganizationUnit(new Employee(1, 'Employee 1', 'Job title 1'));

        $department2 = new Department(12, 'Department 1.2');
        $department2->addOrganizationUnit(new Employee(3, 'Employee 3', 'Job title 3'));
        $department->addOrganizationUnit($department2);

        $department->addOrganizationUnit(new Employee(2, 'Employee 2', 'Job title 2'));
        $organization->addOrganizationUnit($department);

        $department = new Department(2, 'Department 2');
        $department->addOrganizationUnit(new Employee(1, 'Employee 1', 'Job title 1'));
        $department->addOrganizationUnit(new Employee(2, 'Employee 2', 'Job title 2'));
        $organization->addOrganizationUnit($department);

        $expected = <<<EOL
Organization name : Organization
Organization details :

    Department ID : 1
    Department name : Department 1
    Department details :

        Employee ID : 1
        Employee name : Employee 1
        Employee job title : Job title 1

        Department ID : 12
        Department name : Department 1.2
        Department details :

            Employee ID : 3
            Employee name : Employee 3
            Employee job title : Job title 3

        Employee ID : 2
        Employee name : Employee 2
        Employee job title : Job title 2

    Department ID : 2
    Department name : Department 2
    Department details :

        Employee ID : 1
        Employee name : Employee 1
        Employee job title : Job title 1

        Employee ID : 2
        Employee name : Employee 2
        Employee job title : Job title 2
EOL;

        $this->assertEquals($expected, $organization->displayDetails());
    }

    #[Test]
    public function itCanRemoveDepartmentsFromOrganizationUnit()
    {
        $organization = new Organization('Organization');

        $department = new Department(1, 'Department 1');
        $employee1 = new Employee(1, 'Employee 1', 'Job title 1');
        $department->addOrganizationUnit($employee1);

        $department2 = new Department(12, 'Department 1.2');
        $department2->addOrganizationUnit(new Employee(3, 'Employee 3', 'Job title 3'));
        $department->addOrganizationUnit($department2);

        $department->addOrganizationUnit(new Employee(2, 'Employee 2', 'Job title 2'));
        $department->removeOrganizationUnit($employee1);
        $organization->addOrganizationUnit($department);

        $department = new Department(2, 'Department 2');
        $department->addOrganizationUnit(new Employee(1, 'Employee 1', 'Job title 1'));
        $department->addOrganizationUnit(new Employee(2, 'Employee 2', 'Job title 2'));
        $organization->addOrganizationUnit($department);

        $expected = <<<EOL
Organization name : Organization
Organization details :

    Department ID : 1
    Department name : Department 1
    Department details :

        Department ID : 12
        Department name : Department 1.2
        Department details :

            Employee ID : 3
            Employee name : Employee 3
            Employee job title : Job title 3

        Employee ID : 2
        Employee name : Employee 2
        Employee job title : Job title 2

    Department ID : 2
    Department name : Department 2
    Department details :

        Employee ID : 1
        Employee name : Employee 1
        Employee job title : Job title 1

        Employee ID : 2
        Employee name : Employee 2
        Employee job title : Job title 2
EOL;

        $this->assertEquals($expected, $organization->displayDetails());
    }
}
