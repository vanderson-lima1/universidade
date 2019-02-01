<?php

namespace App\Util;
use App\Models\Unity;
use App\Models\Institution;

class SessionInformation {
    
    CONST ROLE  = [
        1 => 'Employee',
        2 => 'Student'
    ];

    // com usuario logado verifica qual é a sua unidade e retorna, acho que essa funcão deve ficar em usario retornando um objeto de unidade
    // ou carregada na mémoria, com final atributos toda vez q o usuário abre a sessão

    static function unityLoggedIn() {
        $unity = Unity::first();
        if(!$unity){
            $unity->name = "NAO ENCONTRADO";
        }
        //$unity->id = 1;
        return $unity;
    }

    static function institutionLoggedIn() {
        $institution = Institution::first();
        if(!$institution){
            $institution->name = "NAO ENCONTRADO";
        }
        //$institution->id = 1;
        return $institution;
    }

<<<<<<< HEAD
=======
    static function roleLoggedIn() {
        return ROLE[1].value;
    }
>>>>>>> 16nd - Inicio erro git
}
