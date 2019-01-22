<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
    protected $fillable = [
        'name',
        'institution_id',
        
    ];

    // ManyToOne ou OneToMany(Inverse) //
    public function institution() {
        return $this->belongsTo(Institution::class);
    }
}
