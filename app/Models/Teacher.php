<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'unity_id',
    ];

    public function unity() {
        return $this->belongsTo(Unity::class);
    }
}
