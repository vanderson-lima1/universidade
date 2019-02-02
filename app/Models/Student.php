<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'nrLessons',
        'period',
        'unity_id',
    ];

    // ManyToOne ou OneToMany(Inverse) //
    public function unity() {
        return $this->belongsto(Unity::class);
    }
}
