<?php

namespace App\Util;

use Illuminate\Support\Collection;
use App\Models\Ability;
use App\Models\Role;

class RotasDoSistema {

    static function principal() {

        $selectionRoutesNames = collect(\Route::getRoutes())->map(function ($route) {return $route->getName();});
        //$selectionRoutesUri   = collect(\Route::getRoutes())->map(function ($route) {return $route->uri();});
        //$selectionRoutesActionNames = collect(\Route::getRoutes())->map(function ($route) {return $route->getActionName();});
        //$selectionRoutesHost = collect(\Route::getRoutes())->map(function ($route) {return $route->domain();});
        //$selectionRoutes = collect(\Route::getRoutes())->map(function ($route) {return $route->domain();});

        $elementos = $selectionRoutesNames;

        return $elementos;

    }

    /*
    * Usar somente 1 vez pra criacão das abilidades, quando estiverem vazias na tabela
    * essa função pode ser colocada em uma seed, para carregar a tabela na 1vez q sobe o sistema
    */
    static function criaTodasHabilidades() {
        $ability = new Ability();
        $resources = $ability->listResources();
        $actions = $ability->listActions();

        for ($i=0 ; $i < count($resources); $i++) {
            for ($j=0 ; $j < count($actions); $j++) {
                $resource =  $resources[$i];
                $action = $actions[$j];
                $resource_action = $resource . $action;
                $data['resource'] = $resource;
                $data['action'] = $action;
                $data['resource_action'] = $resource . "." . $action;
                Ability::Create($data);
            }
        }
           
    }

    /*
    * RETIRAR !!!!
    * Adiciona todas actions de uma rota a um perfil, funcão criada p/ ajudar nos testes
    */
    static function adicionaRotasAoPerfil($resource, Role $role) {
        $resourceAbilities = Ability::whereResource($resource)->get();
        foreach($resourceAbilities as $resourceAbility){
            $role->abilities($resourceAbility);
            $role->save();
        }        
    }



}