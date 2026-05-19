<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCars extends Model
{
    //

    protected $table = 't_service_cars';

    protected $fillable = [
        'id',
        'user_id',
        'plate_number',
        'car_model_id',
        'is_active',
    ];

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

}
