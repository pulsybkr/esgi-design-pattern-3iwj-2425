<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice9;

interface Observable
{
    public function attach(Observer $observer): void;

    public function detach(Observer $observer): void;

    public function notify(): void;
}
