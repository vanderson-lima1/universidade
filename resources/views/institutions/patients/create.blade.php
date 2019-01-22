@extends('layouts.layout')
@section('content')   
    <h4> Universidade {{$unity->institution->name}}  </h4>
    <br/>
    <h4> Novo Paciente Unidade {{$unity->name}} </h4>
    <br/>
    
    @include('util._erros')

    <form method="POST" action="{{route('patients.store')}}">
        
        @include('institutions.patients._form')

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('patients.index')}}">&lArr; voltar a lista</a>
@endsection