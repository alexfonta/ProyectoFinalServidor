<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'twitter',
        'instagram',
        'twitch',
        'photo',
        'visible',
        'age',
        'role',
    ];
}
