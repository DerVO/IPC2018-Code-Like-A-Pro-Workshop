<?php declare(strict_types = 1);
namespace BusFlix;

class Bus {

    /** @var int  */
    private $capacity = 0;
    private $taken_seats = 0;

    public function __construct(int $capacity, int $preOccupiedSeats = 0) {
        $this->capacity = $capacity;
        if ($preOccupiedSeats > 0) {
            for ($i = 0; $i < $preOccupiedSeats; $i++) {
                $this->board(new Passenger());
            }
        }
    }

    public function board(Passenger $passenger) {
        if ($this->isFull()) {
            throw new BusFullException();
        }
        $passenger->seat();
        $this->taken_seats++;
    }

    public function boardQueue(array $passengers) {
        $result = new BusBoardingResult();
        foreach ($passengers as $passenger) {
            try {
                $this->board($passenger);
                $result->addPassengerSuccessfulBoarded($passenger);
            } catch (BusFullException $e) {
                $result->addPassengerNotBoarded($passenger);
            }
        }

        return $result;
    }

    public function isEmpty(): bool {
        return $this->taken_seats === 0;
    }

    public function isFull(): bool {
        return $this->availableCapacity() <= 0;
    }

    public function totalCapacity() {
        return $this->capacity;
    }

    public function availableCapacity() {
        return $this->capacity - $this->taken_seats;
    }
}
