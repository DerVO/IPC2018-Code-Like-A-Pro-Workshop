<?php declare(strict_types = 1);
namespace BusFlix;

use PHPUnit\Framework\TestCase;

class BusTest extends TestCase
{

    public function testCreateBusWithoutCapacity()
    {
        $this->expectException(\ArgumentCountError::class);
        new Bus();
    }

    public function testCreateBusWithCapacity()
    {
        $bus = new Bus(50);
        $this->assertSame(50, $bus->hasCapacity());
    }
}
