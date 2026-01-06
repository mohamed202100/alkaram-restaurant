<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'reservation_date',
        'reservation_time',
        'guests',
        'notes',
        'status'
    ];

    protected $casts = [
        'reservation_date' => 'date',
        // 'reservation_time' => 'datetime', // Time casting can be tricky, string is often safer for simple storage or custom cast
    ];
}
