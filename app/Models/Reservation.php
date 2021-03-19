<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'reservation';
    protected $fillable = ['id', 'id_car', 'date_from', 'date_to', 'location_from', 'location_to', 'price', 'id_user'];
    public $timestamps = false;
}
?>