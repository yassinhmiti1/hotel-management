<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'address',
        'identity_type',
        'identity_member'
    ];

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
