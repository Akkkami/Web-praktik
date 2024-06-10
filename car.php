<?php

abstract class Vehicle
{
    public VehicleType $type;

    public function __construct(VehicleType $type)
    {
        $this->type = $type;
    }

    abstract public function canParkOnFloor(int $floor): bool;
}

class Car extends Vehicle
{
    public function __construct()
    {
        parent::__construct(VehicleType::CAR);
    }

    public function canParkOnFloor(int $floor): bool
    {
        return $floor >= 1 && $floor <= 3;
    }
}

class Truck extends Vehicle
{
    public function __construct()
    {
        parent::__construct(VehicleType::TRUCK);
    }

    public function canParkOnFloor(int $floor): bool
    {
        return $floor == 1;
    }
}
?>