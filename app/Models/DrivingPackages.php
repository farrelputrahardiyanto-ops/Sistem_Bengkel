<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrivingPackages extends Model
{
    //

    protected $table = 't_driving_packages';

    protected $fillable = [
        'ac_type',
        'total_hours',
        'price',
    ];
}
