<?php declare(strict_types = 1);
namespace BusFlix;

class Passenger {

    /** @var bool  */
    private $_is_seated = false;

    public function isSeated():bool {
        return $this->_is_seated;
    }
}
