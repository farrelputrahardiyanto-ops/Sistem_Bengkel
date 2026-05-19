<?php

namespace App\Models;

use App\Models\CartsItem;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = 't_carts';

    protected $fillable = [
        'user_id',
        'status'
    ];

        public function items()
    {
        return $this->hasMany(CartsItem::class, 'cart_id');
    }

}
