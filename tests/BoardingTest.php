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

    public function testSuccessfulBoardingQueue() {
        $bus = new Bus(5, 1);
        $queue = [new Passenger(), new Passenger(), new Passenger()];
        $bus->boardQueue($queue);

        $this->assertFalse($bus->isFull());
    }

    public function testUnsuccessfulBoardingQueue() {
        $bus = new Bus(5, 1);
        $queue = [new Passenger(), new Passenger(), new Passenger(),new Passenger(), new Passenger()];

        $this->expectException(PartialBoardingException::class);
        $bus->boardQueue($queue);
    }

    /*
    public function testResheduleOnBoardingQueue() {
        $bus = new Bus(4, 1);

        try {
            $queue = [new Passenger(), new Passenger(), new Passenger(),new Passenger(), new Passenger()];
            $bus->boardQueue($queue);
        } catch (BusFullException $e) {
            $this->assertInternalType('array', $e->passengersToReshedule());
            $this->assertEquals(2, count($e->passengersToReshedule()));
            $this->assertContainsOnlyInstancesOf(Passenger::class, $e->passengersToReshedule());
        }

    }
    */

}
