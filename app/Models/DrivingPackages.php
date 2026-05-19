<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrivingPackages extends Model
{
    //

    protected $table = 't_driving_packages';

    protected $fillable = [
        'transmission_type',
        'ac_type',
        'tutor_id',
        'car_id',
        'total_hours',
        'price',
    ];
}
