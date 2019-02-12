@extends('layouts.layout')
@section('content') 

<div class="container-main-top">
    <div class="box-main-left text-custom">
        Universidade {{$unity->institution->name}}    
    </div>
</div>

<br>


    @include('util._erros')

    <form id="formPatients" class="col s12" method="POST" action="{{route('patients.store')}}">
        
        @include('institutions.patients._form')

        <div class="box-button-dab">
            <button id="btnSubmit" class="waves-effect waves-light btn btn-create" type="submit">
                Cadastrar
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('patients.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection