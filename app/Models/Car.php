<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Car extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'car';

    protected $fillable = ['id','mark', 'model', 'engine_capacity', 'type', 'year', 'color', 'location', 'price', 'image', 'description'];

    public $timestamps = false;
}
