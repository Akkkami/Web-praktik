<?php
// Enum для типов транспортных средств
enum VehicleType: string {
    case Car = 'c';
    case Truck = 't';

    public static function fromChar(string $char): self {
        return match ($char) {
            'c' => self::Car,
            't' => self::Truck,
        };
    }
}
// Класс, представляющий один этаж парковки
class ParkingFloor {
    private int $availableSpaces;

    public function __construct(int $availableSpaces) {
        $this->availableSpaces = $availableSpaces;
    }

    public function parkVehicle(): bool {
        if ($this->availableSpaces > 0) {
            $this->availableSpaces--;
            return true;
        }
        return false;
    }
}
// Класс для управления парковкой
class ParkingLot {
    private array $floors;

    public function __construct(int $floor1Spaces, int $floor2Spaces, int $floor3Spaces) {
        $this->floors = [
            1 => new ParkingFloor($floor1Spaces),
            2 => new ParkingFloor($floor2Spaces),
            3 => new ParkingFloor($floor3Spaces)
        ];
    }

    public function parkVehicle(VehicleType $type): string {
        $floorsToCheck = ($type === VehicleType::Car) ? [3, 2, 1] : [1];

        foreach ($floorsToCheck as $floor) {
            if ($this->floors[$floor]->parkVehicle()) {
                return 'y';
            }
        }

        return 'n';
    }
}

function main() {
    $inputs = [
        [2, 1, 3],
        [1, 2, 3]
    ];

    $vehicles = [
        ['c', 'c', 'c', 'c', 't'],
        ['t', 't', 'c', 't', 't', 'c', 't', 'c']
    ];

    foreach ($inputs as $index => $input) {
        [$floor1, $floor2, $floor3] = $input;
        $parkingLot = new ParkingLot($floor1, $floor2, $floor3);
        $result = '';

        foreach ($vehicles[$index] as $vehicle) {
            $type = VehicleType::fromChar($vehicle);
            $result .= $parkingLot->parkVehicle($type) . ' ';
        }

        echo trim($result) . PHP_EOL;
    }
}

main();
?>
