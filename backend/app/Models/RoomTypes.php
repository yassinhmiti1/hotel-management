<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    protected $fillable = [
        'name',
        'capacity',
        'base_price'
    ];
}
