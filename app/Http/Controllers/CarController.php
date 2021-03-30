<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;

class CarController extends Controller
{
    private $carService;

    public function __construct()
    {
        $this->carService = new CarService();
    }
    
    public function getAllCars()
    {
        return $this->carService->getAllCars();
    }
    
    public function addNewCar(Request $request)
    {
        return $this->carService->addNewCar(
            $request->mark, 
            $request->model, 
            $request->engineCapacity, 
            $request->type, 
            $request->year, 
            $request->color, 
            $request->location, 
            $request->price, 
            $request->image, 
            $request->description);
    }
    
    public function deleteCar(Request $request)
    {
        return $this->carService->deleteCar($request->id);
    }

    public function updateCar(Request $request)
    {
        return $this->carService->updateCar($request->id, $request->columnName, $request->newValue);
    }
}
