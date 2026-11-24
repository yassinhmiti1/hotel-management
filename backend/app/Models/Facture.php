<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'reservation_id',
        'invoice_number',
        'issue_date',
        'subtotal'
    ];
}
