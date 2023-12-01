<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardGame extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category',
        'video',
        'number_gamer',
        'playing_time',
        'complexity',
        'rating',
        'number_rating',
        'published_date',
        'rank'
    ];

}
