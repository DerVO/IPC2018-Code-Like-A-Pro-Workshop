<?php declare(strict_types = 1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

class PassengerTest extends TestCase
{

    public function testPassengerInitiallyIsUnseated() {
        $passenger = new Passenger();
        $this->assertFalse($passenger->isSeated());
    }

    public function testPassengerInBusIsSeated() {
        $bus = new Bus(5);
        $passenger = new Passenger();
        $bus->board($passenger);

        $this->assertTrue($passenger->isSeated());
    }

}
