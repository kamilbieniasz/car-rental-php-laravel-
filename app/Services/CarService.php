<?php

namespace App\Services;

use App\Models\Car;

class CarService
{
    public function __construct() {}
    
    public function getAllCars()
    {
        return Car::all();
    }

    public function addNewCar($mark, $model, $engineCapacity, $type, $year, $color, $location, $price, $image, $description)
    {
        $car = [
            'mark'=>$mark, 
            'model'=>$model,
            'engine_capacity'=>$engineCapacity, 
            'type'=>$type, 
            'year'=>$year, 
            'color'=>$color, 
            'location'=>$location, 
            'price'=>$price, 
            'image'=>$image, 
            'description'=>$description
        ];
        Car::create($car);
        return response()->json("Dodano samochód", 201);
    }

    public function deleteCar($id) {
        Car::where('id', $id)->delete();
        return response()->json("Usunięto samochód", 200);
    }

    public function updateCar($id, $columnName, $newValue)
    {
        $car = Car::where('id', $id)->first();

        foreach($columnName as $key=>$val)
        {
            $name = $columnName[$key];
            $car->$name = $newValue[$key];
        }
        
        $car->save();
        return response()->json("Zaaktualizowano dane samochodu", 200);

        // return $car;
    }
}

?>