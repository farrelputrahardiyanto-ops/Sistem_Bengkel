<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 't_sales';

    protected $fillable = [
        'id',
        'user_id',
        'total_price',
        'total_parts',
        'status',
    ];

    public function cart()
    {
        return $this->belongsTo(Carts::class, 'cart_id');
    }
}
