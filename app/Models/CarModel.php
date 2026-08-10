<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarBrand;
use App\Models\ServiceCars;

class CarModel extends Model
{
    //

    protected $table = 't_car_models';

    protected $fillable = [
        'brand_id',
        'name',
        'model_year',
        'img',
        'transmission',
        'is_tutor_car',
    ];

    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'brand_id');
    }

    public function cars()
    {
        return $this->hasMany(ServiceCars::class, 'car_model_id');
    }
}
