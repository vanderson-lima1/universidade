<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    // Lembrar de usar função dentro da regra de autorização !!!
    // Route::currentRouteAction(); ou não, iremos ver (pode ser usado no menu)

    protected $RESOURCES = [
         'admin',
         'roles',
         'courses',
         'employees',
         'institutions',
         'patients',
         'students',
         'subjects',
         'teachers',
         'unities',
         'queue',
         'servicequeue',
         'servicequeuehistories'
    ];

    protected $ACTIONS = [
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy',
    ];

    protected $fillable = [
        'resource',
        'action',
        'resource_action',
    ];
    
    public function listResources() {
        $resources =  $this->RESOURCES;
        return $resources;
    }

    public function listActions() {
        $actions =  $this->ACTIONS;
        return $actions;
    }
}
