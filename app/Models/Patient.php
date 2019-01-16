<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    const PERIOD = [
        1 => 'DIURNO',
        2 => 'VESPERTINO',
        3 => 'MATUTINO'
    ];

    protected $fillable = [
        'name',
        'period',
    ];
}
