<?php declare(strict_types = 1);
namespace BusFlix;


class BusBoardingResult
{
    /** @var int  */
    private $id = null;

    /** @var array */
    private $passengers_successful_boarded = [];
    private $passengers_not_boarded = [];

    public function __construct() {
        $this->id = 1; // TODO generate unique ID for this boarding
    }

    public function addPassengerSuccessfulBoarded(Passenger $passenger) {
        $this->passengers_successful_boarded[] = $passenger;
    }

    public function addPassengerNotBoarded(Passenger $passenger) {
        $this->passengers_not_boarded[] = $passenger;
    }

    public function hasUnsuccessfulBoardings() {
        return !empty($this->passengers_not_boarded);
    }

    public function getPassengersNotBoarded() {
        return $this->passengers_not_boarded;
    }


}