<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
        'user_id',
    ];

    public function unity() {
        return $this->belongsTo(Unity::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
