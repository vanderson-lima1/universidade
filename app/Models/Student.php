<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends Model
{
    protected $fillable = [
        'name',
        'nrLessons',
        'period',
        'unity_id',
        'user_id',
    ];

    // ManyToOne ou OneToMany(Inverse) //
    public function unity() {
        return $this->belongsto(Unity::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
