<?php

namespace App\Services;

use App\Models\Car;

class CarService
{
    public function getAllCars()
    {
        return Car::all();
    }
}

?>