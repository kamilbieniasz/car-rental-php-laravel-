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

    public function getUserReservation($id_user)
    {
        //$reservationList = Reservation::join('car','reservation.id_car', '=', 'car.id')->where('id_user', $id_user)->get();
        $reservationList = Reservation::select('*', \DB::raw('reservation.id as reservation_id'))->join('car','reservation.id_car', '=', 'car.id')->where('id_user', $id_user)->get();
        //$reservationList = Reservation::all();
        return $reservationList;
    }

    public function deleteUserReservation($id_reservation)
    {
        $currentReservation = Reservation::where('id',$id_reservation)->get();
        $currentDate = date("Y-m-d");

        // return $currentReservation;
        if($currentReservation && $currentReservation[0]->date_from > $currentDate)
        {
            Reservation::where('id',$id_reservation)->delete();
            return response()->json("Reservation delete", 200);
        }
        else{
            return response()->json("It's to late to cancel reservation", 400);
        }
        return response()->json("Error date id", 404);
        
    }
}

?>