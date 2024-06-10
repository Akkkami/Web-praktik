<?php

enum TypeCar: string
{
    case CAR = 'c';
    case TRUCK = 't';
}

enum Floor: int
{
    case FIRST = 1;
    case SECOND = 2;
    case THIRD = 3;
}

enum ParkingStatus: string
{
    case SUCCESS = 'y';
    case FAILURE = 'n';
}
?>