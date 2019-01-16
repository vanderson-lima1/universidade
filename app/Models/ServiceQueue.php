<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceQueue extends Model
{
    const STATUS = [
        1 => 'Espera',
        2 => 'Atendido',
        3 => 'Agendado',
        4 => 'Cancelado',
        5 => 'Encaminhado',
        6 => 'Encerrado'
    ];

    protected $fillable = [
        'schedulingDate',
        'status',
    ];

    public function protocol(){
        return $this->belongsTo(Protocol::class);
    }
}
