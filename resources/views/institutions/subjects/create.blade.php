@extends('layouts.layout')
@section('content')  

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$unity->institution->name}} /  Unidade {{$unity->institution->name}}
        </div>
    </div>
    <br>

    @include('util._erros')

    <form id="formSubjectsCreate" method="POST" action="{{route('subjects.store')}}">
        
        @include('institutions.subjects._form')

        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Cadastrar
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('subjects.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection