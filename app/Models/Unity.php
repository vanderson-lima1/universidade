<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    protected $fillable = [
        'name',
    ];

    // ManyToOne ou OneToMany(Inverse) //
    public function institution() {
        return $this->belongsTo(Institution::class);
    }
}
