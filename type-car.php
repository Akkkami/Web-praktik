<?php

abstract class Vehicle
{
    public int $id;
    public VehicleType $type;

    public function __construct(VehicleType $type, int $id = null)
    {
        $this->type = $type;
        $this->id = $id;
    }

    abstract public function canParkOnFloor(int $floor): bool;

    public function saveToDatabase(PDO $pdo): void
    {
        $stmt = $pdo->prepare("INSERT INTO vehicles (type) VALUES (:type)");
        $stmt->execute([':type' => $this->type->value]);
        $this->id = $pdo->lastInsertId();
    }
}

class Car extends Vehicle
{
    public function __construct(int $id = null)
    {
        parent::__construct(VehicleType::CAR, $id);
    }

    public function canParkOnFloor(int $floor): bool
    {
        return $floor >= 1 && $floor <= 3;
    }
}

class Truck extends Vehicle
{
    public function __construct(int $id = null)
    {
        parent::__construct(VehicleType::TRUCK, $id);
    }

    public function canParkOnFloor(int $floor): bool
    {
        return $floor == 1;
    }
}
