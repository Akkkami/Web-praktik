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
}
?>