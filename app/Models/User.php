<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
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

    

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
    }
