<?php

class ParkingResult
{
    public Vehicle $vehicle;
    public ParkingStatus $status;

    public function __construct(Vehicle $vehicle, ParkingStatus $status)
    {
        $this->vehicle = $vehicle;
        $this->status = $status;
    }

    public function saveToDatabase(PDO $pdo): void
    {
        $stmt = $pdo->prepare("INSERT INTO parking_results (vehicle_id, status) VALUES (:vehicle_id, :status)");
        $stmt->execute([
            ':vehicle_id' => $this->vehicle->id,
            ':status' => $this->status->value,
        ]);
    }
}
