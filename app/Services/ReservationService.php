<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{
    public function addReservation($id_cars, $date_from, $date_to, $location_from, $location_to, $price, $id_user)
    {

        $inputs = ['id_car'=>$id_cars, 'date_from'=>$date_from, 'date_to'=>$date_to, 'location_from'=>$location_from, 'location_to'=>$location_to, 'price'=>$price, 'id_user'=>$id_user];

        //DB::insert('insert into reservation (id_cars, date_from, date_to, location_from, location_to, price, id_user) values (?, ?, ?, ?, ?, ?, ?)', 
        //[$id_cars, $date_from, $date_to, $location_from, $location_to, $price, $id_user]);
        Reservation::create($inputs);
        return response()->json('Reservation created', 201);
    }
}

?>