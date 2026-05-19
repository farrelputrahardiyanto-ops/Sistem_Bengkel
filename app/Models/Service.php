<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 't_services';

    protected $fillable = [

    'user_id',
    'car_id',
    'sales_id',
    'services_description',
    'time_reservation',
    'status',
    'service_price',
    'total_price'

    ];

    public function car()
    {
        return $this->belongsTo(
            ServiceCars::class,
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
