<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice6;

class IdGenerator
{
    private static int $currentId = 1;

    public static function getId(): int
    {
        return self::$currentId++;
    }

    public static function reset(): void
    {
        self::$currentId = 1;
    }
} 