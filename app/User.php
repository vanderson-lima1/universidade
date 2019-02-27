<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Unity;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Admin;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'actorModel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Models dos Atores do sistema.
     */    
    protected $ACTORS = [
        'Admin',
        'Teacher',
        'Patient',
        'Student',
        'Employee',
    ];

    /**
     * Verifica se usuario tem permissão para aquele acesso.
     */    
    public function hasPermission($nameAbility) {        
        $encontrouRegra = false;
        $abilities =  $this->role->abilities;
        foreach ($abilities as $ability) {
            if($ability->resource_action == $nameAbility){
                $encontrouRegra = true;
                break;
             }
         }
         return $encontrouRegra;
    }

    /**
     * Retorna Objeto do usuario(actorModel) logado.
     */    
    public function actorLoggedIn() {
        $actorModel = 'App\\Models\\' . $this->actorModel;        
        $actor = new  $actorModel();
        $actors = $actor->whereId($this->id)->get();                
        return $actors->pop();
        /*
        switch($actorModel) {
            case "Admin":
                $actor = new Admin();
                $actor = $actor->whereId($this->id)->get()->pop();
                return $actor;
            case "Teacher":
                $actor = new Teacher();
                return $actor;

        } */
              
    }

     /**
     * Retorna Unidade do usuario(actorModel) logado.
     */  
    public function unityLoggedIn() {
        $actor = $this->actorLoggedIn();
        return $actor->unity;         
    }

     /**
     * Retorna Instituição do usuario(actorModel) logado.
     */  
    public function institutionLoggedIn() {
        $actor = $this->actorLoggedIn();
        return $actor->unity->institution;         
    }

    /**
     * Retorna Atores Validos
     */  
    public function validsActors() {  
        $actors = $this->$ACTORS;
        return $actors;
    }

     /**
     * Verifica se usuario é o Admin (True or False).
     */  
    public function isAdmin() {        
        return $this->actorModel == "Admin";
    }

    /**
     * Verifica se usuario é o Professor (True or False).
     */  
    public function isTeacher() {        
        return $this->actorModel == "Teacher";
    }

    /**
     * Verifica se usuario é o Employee (True or False).
     */  
    public function isEmployee() {        
        return $this->actorModel == "Employee";
    }

    /**
     * Verifica se usuario é o Student (True or False).
     */  
    public function isStudent() {        
        return $this->actorModel == "Student";
    }

    /**
     * Verifica se usuario é o Patient (True or False).
     */  
    public function isPatient() {        
        return $this->actorModel == "Patient";
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
    
}
