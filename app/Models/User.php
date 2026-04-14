<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //

    protected $table = 't_users';

    protected $fillable = [
        'name',
        'profile_picture',
        'email',
        'no_whatsapp',
        'password',
        'role'
    ];
}
