<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    public function addReservation(Request $request, ReservationService $reservationService)
    {
        return $reservationService->addReservation($request->id_car, 
                                                $request->date_from, 
                                                $request->date_to, 
                                                $request->location_from, 
                                                $request->location_to,
                                                $request->price,
                                                $request->id_user);
    }

    public function getUserReservation(Request $request, ReservationService $reservationService)
    {
        return $reservationService->getUserReservation($request->id_user);
    }

    public function deleteUserReservation(Request $request, ReservationService $reservationService)
    {
        return $reservationService->deleteUserReservation($request->id);
    }
}
