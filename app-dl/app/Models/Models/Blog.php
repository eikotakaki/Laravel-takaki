<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    //テーブル名とクラスの紐付き    
    protected $table = 'blogs';

    //可変項目
    protected $fillable = 
    [
        'title',
        'content'
    ];





}
