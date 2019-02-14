<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'unity_id',
        'user_id',
    ];

    public function unity() {
        return $this->belongsTo(Unity::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
