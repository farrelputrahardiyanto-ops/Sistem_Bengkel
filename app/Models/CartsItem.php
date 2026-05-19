<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartsItem extends Model
{
     protected $table = 't_cart_items';

    protected $fillable = [
        'cart_id',
        'sparepart_id',
        'qty',
        'price'
    ];

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'sparepart_id');
    }

}
