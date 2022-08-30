<?php

namespace App\Models;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
/* use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; */

class Pres extends Model
{

    protected $fillable = [
        'email',
        'token',
        //'expiration_datetime',
    ];

    public static function build($email, $token)
    {
        $hours = 24;
        $resister   = new self([
            'email' => $email,
            'token' => $token,
        ]);
        return $resister;
    }
    
    public static function findByToken($token)
    {
        return self::where('token', '=', $token)->first();
    }

}
