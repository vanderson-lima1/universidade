@extends('layouts.layout')
@section('content')  

<div class="container-main-top">
    <div class="box-main-left text-custom">
        Universidade {{$unity->institution->name}}    
    </div>
</div>

<br>

    @include('util._erros')

    <form id="formEmployeesCreate" method="POST" action="{{route('employees.store')}}">
        
        @include('institutions.employees._form')

        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Cadastrar
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('employees.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection