<?php
require_once 'car.php';
require_once 'parking.php';

$cars1 = [new Car('c'), new Car('t'), new Car('c'), new Car('c')];
$cars2 = [new Car('t'), new Car('t'), new Car('t'), new Car('t'), new Car('t'), new Car('c'), new Car('c'), new Car('c')];
$cars3 = [new Car('t'), new Car('t'), new Car('t'), new Car('t'), new Car('t'), new Car('c'), new Car('c'), new Car('c')];

$parking1 = new Parking([4, 12, 3]);
$parking2 = new Parking([1, 4, 3]);
$parking3 = new Parking([4, 2, 3]);

foreach ($cars1 as $car) {
    if ($parking1->parkCar($car)) {
        echo "Машина типа " . $car->getType() . " успешно припаркована.<br>";
    } else {
        echo "Не удалось припарковать машину типа " . $car->getType() . ". Недостаточно мест.<br>";
    }
}

foreach ($cars2 as $car) {
    if ($parking2->parkCar($car)) {
        echo "Машина типа " . $car->getType() . " успешно припаркована.<br>";
    } else {
        echo "Не удалось припарковать машину типа " . $car->getType() . ". Недостаточно мест.<br>";
    }
}

foreach ($cars3 as $car) {
    if ($parking3->parkCar($car)) {
        echo "Машина типа " . $car->getType() . " успешно припаркована.<br>";
    } else {
        echo "Не удалось припарковать машину типа " . $car->getType() . ". Недостаточно мест.<br>";
    }
}
?>