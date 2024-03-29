@extends('layouts.layout')
@section('content')   

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Nova Unidade
        </div>
    </div>
    <br>

    @include('util._erros')

    <form id="formUnitiesCreate" method="POST" action="{{route('unities.store')}}">
        
        @include('institutions.unities._form')

        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Cadastrar
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('unities.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection