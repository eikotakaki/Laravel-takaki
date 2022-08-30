<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //テーブル名とクラスの紐付き    
    protected $table = 'comments';

    //可変項目
    protected $fillable = 
    [
        'user_uuid',
        'post_id',
        'content',
        
    ];

    




}
