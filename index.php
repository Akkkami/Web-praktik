<?php

require 'VehicleType.php';
require 'car.php';
require 'Vehicle.php';
require 'type-car.php';
require 'parking.php';
require 'ParkingResult.php';

// Подключаемся к базе данных Microsoft SQL Server
$serverName = "DESKTOP-KFHRIFS\MSSQLSERVER01";
$connectionOptions = [
    "Database" => "parking",
    "Uid" => "",
    "PWD" => ""
];
$dsn = "sqlsrv:server=$serverName;Database=parking_db";
$pdo = new PDO($dsn, $connectionOptions['Uid'], $connectionOptions['PWD']);

// Получаем данные из входного потока (например, из формы или командной строки)
$spacesFloor1 = intval($_POST['spacesFloor1']);
$spacesFloor2 = intval($_POST['spacesFloor2']);
$spacesFloor3 = intval($_POST['spacesFloor3']);
$vehiclesInput = $_POST['vehicles']; // Пример: "t c c c"

// Создаем объект парковки
$parking = new Parking($spacesFloor1, $spacesFloor2, $spacesFloor3);
$parking->saveToDatabase($pdo);

// Обрабатываем каждый автомобиль
$vehicles = explode(' ', $vehiclesInput);
foreach ($vehicles as $vehicleCode) {
    $vehicle = $vehicleCode === VehicleType::CAR->value ? new Car() : new Truck();
    $vehicle->saveToDatabase($pdo);
    $status = $parking->parkVehicle($vehicle);
    $result = new ParkingResult($vehicle, $status);
    $result->saveToDatabase($pdo);
    echo $status->value . ' ';
}
