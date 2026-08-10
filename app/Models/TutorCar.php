<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorCar extends Model
{
    protected $table = 't_tutor_car';

    protected $fillable = [
        'id',
        'car_id',
        'amount',
        'ac_type',
    ];


    public function car()
    {
        return $this->belongsTo(CarModel::class, 'car_id');
    }
}
