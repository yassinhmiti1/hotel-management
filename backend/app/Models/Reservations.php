<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable = [
        'client_id',
        'room_id',
        'check_in',
        'check_out',
        'guests_count',
        'nights'
    ];
}
