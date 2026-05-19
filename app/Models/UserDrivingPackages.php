<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDrivingPackages extends Model
{
    //
    protected $table = 't_user_driving_packages';

    protected $fillable = [
        'id',
        'user_id',
        'tutor_id',
        'car_id',
        'status',
        'package_id',
        'remaining_hours',
    ];

    public function package()
{
    return $this->belongsTo(
        DrivingPackages::class,
        'package_id'
    );
}

public function tutor()
{
    return $this->belongsTo(
        User::class,
        'tutor_id'
    );
}

public function car()
{
    return $this->belongsTo(
        CarModel::class,
        'car_id'
    );
}

public function user()
{
    return $this->belongsTo(
        User::class,
        'user_id'
    );
}
}
