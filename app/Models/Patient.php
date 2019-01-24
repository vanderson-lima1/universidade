<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    const PERIOD = [
        1 => 'Manhã',
        2 => 'Tarde',
        3 => 'Noite'
    ];

    protected $fillable = [
        'unity_id',
        'name',
        'sex',        
        'period',
        'phone',
        'documentCPF',
        'documentRG',
        'documentSUS',
    ];

    public function unity() {
        return $this->belongsTo(Unity::class);
    }
}
