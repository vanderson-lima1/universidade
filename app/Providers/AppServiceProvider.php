<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // SQLSTATE[4200] Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
        // A partir da versão 5.4 ele começou a trabalhar como emoticons gravados no banco de dados 
        // Solução aumentar o tamanho do StringLength(descomentar a linha abaixo somente)
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
