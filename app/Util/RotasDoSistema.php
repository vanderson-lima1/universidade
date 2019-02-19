<?php

namespace App\Util;

use Illuminate\Support\Collection;

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

}