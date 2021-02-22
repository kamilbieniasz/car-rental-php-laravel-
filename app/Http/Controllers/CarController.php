<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;

class CarController extends Controller
{
    public function getAllCars(CarService $carService)
    {
        return $carService->getAllCars();
    }
}
