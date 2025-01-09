<?php

use EdemotsCourses\EsgiDesignPattern\Exercice8\HumiditySensor;
use EdemotsCourses\EsgiDesignPattern\Exercice8\PrecipitationSensor;
use EdemotsCourses\EsgiDesignPattern\Exercice8\TemperatureSensor;
use EdemotsCourses\EsgiDesignPattern\Exercice8\WeatherAssistantFacade;
use EdemotsCourses\EsgiDesignPattern\Exercice8\WindSensor;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Exercice8Test extends TestCase
{
    #[Test]
    #[DataProvider('weatherConditionForTodaysSummaryProvider')]
    public function itReturnsCurrentWeatherConditions($temperature, $humidity, $windSpeed, $precipitation, $precipitationForecast)
    {
        $temperatureSensor = $this->createMock(TemperatureSensor::class)
            ->expects($this->atLeastOnce())
            ->method('getCurrentTemperature')
            ->willReturn($temperature);
        $humiditySensor = $this->createMock(HumiditySensor::class)
            ->expects($this->atLeastOnce())
            ->method('getCurrentHumidity')
            ->willReturn($humidity);
        $windSensor = $this->createMock(WindSensor::class)
            ->expects($this->atLeastOnce())
            ->method('getWindSpeed')
            ->willReturn($windSpeed);
        $precipitationSensor = $this->createMock(PrecipitationSensor::class)
            ->expects($this->atLeastOnce())
            ->method('getCurrentRainRate')
            ->willReturn($precipitation)
            ->method('getRainForecast')
            ->willReturn($precipitationForecast);

        $weatherAssistant = new WeatherAssistantFacade($temperatureSensor, $humiditySensor, $windSensor, $precipitationSensor);
        $weatherAssistant->getTodaysSummary();
    }

    public static function weatherConditionForTodaysSummaryProvider()
    {
        return [
            [12, 80, 5, 0.5, ['probability' => 30.0, 'intensity' => 'normal']],
            [25, 50, 10, 0, ['probability' => 0.0, 'intensity' => null]],
            [18, 70, 3, 0, ['probability' => 8.0, 'intensity' => 'light']],
            [10, 90, 7, 0.8, ['probability' => 76.0, 'intensity' => 'heavy']],
            [30, 40, 15, 0, ['probability' => 0.0, 'intensity' => null]],
            [20, 60, 5, 0.2, ['probability' => 15.0, 'intensity' => 'light']],
            [15, 75, 2, 0.1, ['probability' => 3.0, 'intensity' => 'light']],
            [8, 85, 6, 0.7, ['probability' => 61.0, 'intensity' => 'heavy']],
        ];
    }

    #[Test]
    #[DataProvider('weatherConditionForUmbrellaProvider')]
    public function itReturnsIfShouldTakeUmbrella(bool $should, $temperature, $humidity, $windSpeed, $precipitation, $precipitationForecast)
    {
        $temperatureSensor = $this->createMock(TemperatureSensor::class)
            ->expects($this->never())
            ->method('getCurrentTemperature')
            ->willReturn($temperature);
        $humiditySensor = $this->createMock(HumiditySensor::class)
            ->expects($this->never())
            ->method('getCurrentHumidity')
            ->willReturn($humidity);
        $windSensor = $this->createMock(WindSensor::class)
            ->expects($this->never())
            ->method('getWindSpeed')
            ->willReturn($windSpeed);
        $precipitationSensor = $this->createMock(PrecipitationSensor::class)
            ->expects($this->atLeastOnce())
            ->method('getCurrentRainRate')
            ->willReturn($precipitation)
            ->method('getRainForecast')
            ->willReturn($precipitationForecast);

        $weatherAssistant = new WeatherAssistantFacade($temperatureSensor, $humiditySensor, $windSensor, $precipitationSensor);

        $this->assertSame($should, $weatherAssistant->shouldTakeUmbrella());
    }

    public static function weatherConditionForUmbrellaProvider()
    {
        return [
            [true, 12, 80, 5, 0.5, ['probability' => 30.0, 'intensity' => 'normal']],
            [false, 25, 50, 10, 0, ['probability' => 0.0, 'intensity' => null]],
            [false, 18, 70, 3, 0, ['probability' => 8.0, 'intensity' => 'light']],
            [true, 10, 90, 7, 0.8, ['probability' => 76.0, 'intensity' => 'heavy']],
            [false, 30, 40, 15, 0, ['probability' => 0.0, 'intensity' => null]],
            [false, 20, 60, 5, 0.2, ['probability' => 15.0, 'intensity' => 'light']],
            [false, 15, 75, 2, 0.1, ['probability' => 3.0, 'intensity' => 'light']],
            [true, 8, 85, 6, 0.7, ['probability' => 61.0, 'intensity' => 'heavy']],
        ];
    }

    #[Test]
    #[DataProvider('weatherConditionForPicnicProvider')]
    public function itReturnsPicnicRecommandation(bool $recommandation, $temperature, $humidity, $windSpeed, $precipitation, $precipitationForecast)
    {
        $temperatureSensor = $this->createMock(TemperatureSensor::class)
            ->expects($this->atLeastOnce())
            ->method('getCurrentTemperature')
            ->willReturn($temperature);
        $humiditySensor = $this->createMock(HumiditySensor::class)
            ->expects($this->atLeastOnce())
            ->method('getCurrentHumidity')
            ->willReturn($humidity);
        $windSensor = $this->createMock(WindSensor::class)
            ->expects($this->atLeastOnce())
            ->method('getWindSpeed')
            ->willReturn($windSpeed);
        $precipitationSensor = $this->createMock(PrecipitationSensor::class)
            ->expects($this->atLeastOnce())
            ->method('getCurrentRainRate')
            ->willReturn($precipitation)
            ->method('getRainForecast')
            ->willReturn($precipitationForecast);

        $weatherAssistant = new WeatherAssistantFacade($temperatureSensor, $humiditySensor, $windSensor, $precipitationSensor);

        $this->assertSame($recommandation, $weatherAssistant->getPicnicRecommendation());
    }

    public static function weatherConditionForPicnicProvider()
    {
        return [
            [false, 12, 80, 5, 0.5, ['probability' => 30.0, 'intensity' => 'normal']],
            [true, 25, 50, 10, 0, ['probability' => 0.0, 'intensity' => null]],
            [true, 18, 70, 3, 0, ['probability' => 8.0, 'intensity' => 'light']],
            [false, 10, 90, 7, 0.8, ['probability' => 76.0, 'intensity' => 'heavy']],
            [false, 30, 40, 15, 0, ['probability' => 0.0, 'intensity' => null]],
            [false, 20, 60, 5, 0.2, ['probability' => 15.0, 'intensity' => 'light']],
            [false, 15, 75, 2, 0.1, ['probability' => 3.0, 'intensity' => 'light']],
            [false, 8, 85, 6, 0.7, ['probability' => 61.0, 'intensity' => 'heavy']],
        ];
    }
}
