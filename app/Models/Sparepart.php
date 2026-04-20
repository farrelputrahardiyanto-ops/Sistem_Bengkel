<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    //

    protected $table = 't_spareparts';

    protected $fillable = [
        'name',
        'img',
        'brand_spareparts',
        'brand_car',
        'car_type',
        'part_code',
        'price',
        'stock',
        'description',
        'image'
    ];
}
