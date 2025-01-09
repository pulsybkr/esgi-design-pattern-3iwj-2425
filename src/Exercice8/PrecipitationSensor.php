<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice8;

class PrecipitationSensor
{
    public function getCurrentRainRate(): float
    {
        return 0.0; // mm/h
    }

    public function getRainForecast(int $hoursAhead): array
    {
        return [
            'probability' => 30,
            'intensity' => 'light'
        ];
    }
}
