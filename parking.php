<?php

class Parking {
    private $spaces;

    public function __construct($spaces) {
        $this->spaces = $spaces;
    }

    public function parkCar($car) {
        if ($car->getType() === 't') {
            if ($this->spaces[0] > 0) {
                $this->spaces[0]--;
                return true;
            }
        } else {
            $maxFloor = max(array_keys($this->spaces));
            if ($maxFloor > 0 && $this->spaces[$maxFloor] > 0) {
                $this->spaces[$maxFloor]--;
                return true;
            }
        }
        return false;
    }
    
}

?>