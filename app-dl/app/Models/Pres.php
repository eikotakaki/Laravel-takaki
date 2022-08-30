<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
/* use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; */

class Pres extends Model
{
    const SEND_MAIL = 0;   // 仮会員登録のメール送信
    const MAIL_VERIFY = 1; //メールアドレス認証
    const REGISTER = 2;    // 本会員登録完了

    protected $fillable = [
        'email',
        'token',
        'expiration_datetime',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function build($email, $token)
    {
        $hours = 24;
        $resister   = new self([
            'email' => $email,
            'token' => $token,
            'expiration_datetime' => Carbon::now()->addHours($hours),
        ]);
        return $resister;
    }
}
