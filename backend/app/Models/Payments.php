<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'reservation_id',
        'amount',
        'payment_method',
        'payment_date'
    ];
}
