<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'unity_id',
    ];

    public function unity() {
        return $this->belongsTo(Unity::class);
    }
}
