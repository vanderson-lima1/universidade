<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\Models\Unity;

class Role extends Model
{

    protected $fillable = [
        'name', 
    ];

    /**
    * Retorna collection de perfis de uma especifica Unidade.(falta testar com varias unidades e atores)
    */
    public function onlyUnity(Unity $unity){
       $roles = $this->all();
       $rolesUnity = new Collection();
       foreach ($roles as $role) {
           $users = $role->users;
           foreach($users as $user){
               $actor = $user->actorLoggedIn();               
               if ($actor->unity_id == $unity->id) {
                   $rolesUnity->push($role);
                }
           }           
       }
       return $rolesUnity;
    }

    /**
     * Verifica se perfil tem permissão para aquele acesso.
     */        
    public function hasPermission($nameAbility){
        $encontrouRegra = false;
        $abilities =  $this->abilities;
        foreach ($abilities as $ability) {
            if($ability->resource_action == $nameAbility){
                $encontrouRegra = true;
                break;
             }
         }
         return $encontrouRegra;       
    }

    public function abilities() {
        return $this->belongsToMany(Ability::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
