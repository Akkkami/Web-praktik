<?php

class Parking
{
    private array $availableSpaces;

    public function __construct(int $spacesFloor1, int $spacesFloor2, int $spacesFloor3)
    {
        $this->availableSpaces = [
            1 => $spacesFloor1,
            2 => $spacesFloor2,
            3 => $spacesFloor3,
        ];
    }

    public function parkVehicle(Vehicle $vehicle): ParkingStatus
    {
        for ($floor = 3; $floor >= 1; $floor--) {
            if ($vehicle->canParkOnFloor($floor) && $this->availableSpaces[$floor] > 0) {
                $this->availableSpaces[$floor]--;
                return ParkingStatus::SUCCESS;
            }
        }
        return ParkingStatus::FAILURE;
    }
}
?>