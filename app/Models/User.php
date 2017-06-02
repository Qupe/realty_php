<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getOne($id) {

        $user = new static;

        if ($userData = $user->where('id', $id)->first()) {
            return $userData->toArray();
        }

        return false;
    }

}
