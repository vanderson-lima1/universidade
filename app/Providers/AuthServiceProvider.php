<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        //Seleciona todas rotas do sistema
        $selectionRoutes = collect(\Route::getRoutes())->map(function ($route) {return $route;});

        foreach ($selectionRoutes as $route) {                         
            if (strpos($route->getActionName(), "App\Http\Controllers\Institution")!==false) {                
                Gate::define($route->getName(),$route->getActionName(), function (User $user, $model) use($route) {
                   /*
                   // 1 - posso fazer direito sem usar o foreach só procurando pelo index direto
                   // 2 - passar o codigo abaixo para user e criar uma função que mandando uma 
                   //     string($route->getName()) ele retorna true ou false
                   $encontrouRegra = false;
                   foreach ($user->roles()->abilities() as $ability) {
                       if($ability->resource_action == $route->getName()){
                           $encontrouRegra = true;
                           break 1;
                        }
                    }
                    return $encontrouRegra;
                    */   
                    return true;
                }); 
            }
        }        
    }
}
