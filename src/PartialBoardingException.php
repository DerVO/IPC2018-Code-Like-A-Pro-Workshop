<?php declare(strict_types = 1);
namespace BusFlix;

use Throwable;

class PartialBoardingException extends \Exception {

    private $_passengers_to_reschedule = null;

    public function __construct(string $message = "", int $code = 0, Throwable $previous = null,
                                array $passengers_to_reschedule) {
        $this->_passengers_to_reschedule = $passengers_to_reschedule;
        parent::__construct($message, $code, $previous);
    }

    public function getPassengersToReschedule() {
        return $this->_passengers_to_reschedule;
    }

}
