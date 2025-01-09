<?php

use EdemotsCourses\EsgiDesignPattern\Exercice9\Observer;
use EdemotsCourses\EsgiDesignPattern\Exercice9\StockMarket;
use PHPUnit\Framework\TestCase;

class Exercice9Test extends TestCase
{
    public function testNotifyCallsUpdateOnObservers()
    {
        $stockMarket = new StockMarket();

        $observer1 = $this->createMock(Observer::class);
        $observer2 = $this->createMock(Observer::class);

        $observer1->expects($this->once())
                  ->method('update')
                  ->with($this->equalTo(150.25));

        $observer2->expects($this->once())
                  ->method('update')
                  ->with($this->equalTo(150.25));

        $stockMarket->attach($observer1);
        $stockMarket->attach($observer2);

        $stockMarket->setStockPrice(150.25);
    }

    public function testDetachPreventsObserverFromReceivingUpdates()
    {
        $stockMarket = new StockMarket();

        $observer = $this->createMock(Observer::class);

        $stockMarket->attach($observer);
        $stockMarket->detach($observer);

        $observer->expects($this->never())
                 ->method('update');

        $stockMarket->setStockPrice(200.00);
    }

    public function testObserversReceiveDifferentUpdates()
    {
        $stockMarket = new StockMarket();

        $observer1 = $this->createMock(Observer::class);
        $observer2 = $this->createMock(Observer::class);

        $observer1->expects($this->once())
                  ->method('update')
                  ->with($this->equalTo(300.75));

        $observer2->expects($this->once())
                  ->method('update')
                  ->with($this->equalTo(300.75));

        $stockMarket->attach($observer1);
        $stockMarket->attach($observer2);

        $stockMarket->setStockPrice(300.75);

        $stockMarket->detach($observer1);

        $observer2->expects($this->once())
                  ->method('update')
                  ->with($this->equalTo(450.50));

        $stockMarket->setStockPrice(450.50);
    }
}
