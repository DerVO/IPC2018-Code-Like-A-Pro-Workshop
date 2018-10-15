<?php declare(strict_types = 1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

class PassengerTest extends TestCase
{

    public function testPassengerInitiallyIsUnseated() {
        $passenger = new Passenger();
        $this->assertFalse($passenger->isSeated());
    }

}
