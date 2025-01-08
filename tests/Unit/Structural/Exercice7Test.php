<?php

use EdemotsCourses\EsgiDesignPattern\Exercice7\FormatterInterface;
use EdemotsCourses\EsgiDesignPattern\Exercice7\Product;
use EdemotsCourses\EsgiDesignPattern\Exercice7\ProductDataRenderer;
use EdemotsCourses\EsgiDesignPattern\Exercice7\User;
use EdemotsCourses\EsgiDesignPattern\Exercice7\UserDataRenderer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Exercice7Test extends TestCase
{
    #[Test]
    #[DataProvider('userDataProvider')]
    public function itRenderUserWithFormatter(array $data)
    {
        $formatter = $this->createMock(FormatterInterface::class);
        $formatter->expects($this->once())
            ->method('format')
            ->with($data);

        $userMock = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock()
            ->method('toArray')
            ->willReturn($data);

        $userRenderer = new UserDataRenderer($formatter);
        $userRenderer->render($userMock);
    }

    public static function userDataProvider()
    {
        return [
            ['id' => 1, 'name' => 'Toto', 'email' => 'toto@example.com'],
        ];
    }

    #[Test]
    #[DataProvider('productDataProvider')]
    public function itRenderProductWithFormatter(array $data)
    {
        $formatter = $this->createMock(FormatterInterface::class);
        $formatter->expects($this->once())
            ->method('format')
            ->with($data);

        $productMock = $this->getMockBuilder(Product::class)
            ->disableOriginalConstructor()
            ->getMock()
            ->method('toArray')
            ->willReturn($data);

        $userRenderer = new ProductDataRenderer($formatter);
        $userRenderer->render($productMock);
    }

    public static function productDataProvider()
    {
        return [
            ['id' => 1, 'name' => 'Super produit', 'price' => 3.33],
        ];
    }
}
