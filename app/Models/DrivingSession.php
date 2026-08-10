<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrivingSession extends Model
{
    protected $table = 't_driving_session';

    protected $fillable = [
        'id',
        'id_user_package',
        'car_id',
        'tutor_id',
        'used_hours',
        'session_date',
        'start_datetime',
        'end_datetime',
        'status',
        'note',
        ];


            public function userPackage()
    {
        return $this->belongsTo(
            UserDrivingPackages::class,
            'id_user_package'
        );
    }

    public function instructor()
    {
        return $this->belongsTo(
            User::class,
            'instructor_id'
        );
    }

    public function car()
    {
        return $this->belongsTo(
            CarModel::class,
            'car_id'
        );

}

     public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    // sekalian tambahkan relasi lain yang mungkin juga belum ada
 
    
}