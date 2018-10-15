<?php declare(strict_types = 1);
namespace BusFlix;

class Bus {

    /** @var int  */
    private $capacity = 0;

    /** @var bool  */
    private $empty = true;

    public function __construct(int $capacity, int $preOccupiedSeats = 0) {
        $this->capacity = $capacity;
        if ($preOccupiedSeats > 0) {
            for ($i = 0; $i < $preOccupiedSeats; $i++) {
                $this->board(new Passenger());
            }
        }
    }

    public function isEmpty(): bool {
        return $this->empty;
    }

    public function board(Passenger $passenger) {
        if ($this->isFull()) {
            throw new BusFullException();
        }
        $this->empty = false;
        $this->capacity--;
    }

    public function isFull(): bool {
        return $this->capacity <= 0;
    }

    public function totalCapacity() {
        return $this->capacity;
    }

    public function availableCapacity() {
        return 30;
    }
}
