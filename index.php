<?php

require 'VehicleType.php';
require 'ParkingStatus.php';
require 'Vehicle.php';
require 'Car.php';
require 'Truck.php';
require 'Parking.php';
require 'ParkingResult.php';
require 'Database.php';

// Получаем данные из входного потока (например, из формы или командной строки)
$spacesFloor1 = intval($_POST['spacesFloor1']);
$spacesFloor2 = intval($_POST['spacesFloor2']);
$spacesFloor3 = intval($_POST['spacesFloor3']);
$vehiclesInput = $_POST['vehicles']; // Пример: "t c c c"

// Создаем объект парковки
$parking = new Parking($spacesFloor1, $spacesFloor2, $spacesFloor3);

// Подключаемся к базе данных
$db = new Database('mysql:host=localhost;dbname=parking_db', 'root', 'password');

// Обрабатываем каждый автомобиль
$vehicles = explode(' ', $vehiclesInput);
foreach ($vehicles as $vehicleCode) {
    $vehicle = $vehicleCode === VehicleType::CAR->value ? new Car() : new Truck();
    $status = $parking->parkVehicle($vehicle);
    $result = new ParkingResult($vehicle, $status);
    $db->saveParkingResult($result);
    echo $status->value . ' ';
}
?>