<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
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
        'patient_id',
        'student_id',
        'subject_id',
        'protocol_id',
        'period',
        'status',
    ];
    
    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
    
    public function protocol() {
        return $this->belongsTo(Protocol::class);
    }    
    
}