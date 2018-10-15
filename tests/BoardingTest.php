<?php declare(strict_types = 1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

class BoardingTest extends TestCase {

    public function testBusIsInitiallyEmpty() {
        $bus = new Bus(5);
        $this->assertTrue($bus->isEmpty());
    }

    public function testBusIsNotEmptyOncePassengerHasBoarded() {
        $bus = new Bus(5);
        $bus->board(new Passenger());

        $this->assertFalse($bus->isEmpty());
    }

    public function testBusIsFullOnceItReachedCapacity() {
        $bus = new Bus(2);
        $bus->board(new Passenger());
        $bus->board(new Passenger());

        $this->assertTrue($bus->isFull());
    }

    public function testPassengerCannotBoardFullBus() {
        $bus = new Bus(2);
        $bus->board(new Passenger());
        $bus->board(new Passenger());

        $this->expectException(BusFullException::class);
        $bus->board(new Passenger());
    }

}
