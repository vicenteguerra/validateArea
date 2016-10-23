<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Alsofronie\Uuid\Uuid32ModelTrait;

class User extends Authenticatable
{
    use Uuid32ModelTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
