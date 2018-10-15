<?php declare(strict_types = 1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

class BusTest extends TestCase
{

    public function testFailToCreateBusWithoutCapacity() {
        $this->expectException(\ArgumentCountError::class);
        /** @noinspection PhpParamsInspection */
        new Bus();
    }

    public function testCreateBusWithCapacity() {
        $bus = new Bus(50);
        $this->assertSame(50, $bus->totalCapacity());
    }

    public function testCreatePreBoardedBus() {
        $bus = new Bus(50, 20);
        $this->assertSame(30, $bus->availableCapacity());
    }

    public function testTotalCapacityOnPreBoardedBus() {
        $bus = new Bus(50, 20);
        $this->assertSame(50, $bus->totalCapacity());
    }
}
