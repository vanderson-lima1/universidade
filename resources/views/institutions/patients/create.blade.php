@extends('layouts.layout')
@section('content')   
    <h1> Universidade {{$unity->institution->name}}  </h1>
    <br/></br/>
    <h3> Novo Paciente Unidade {{$unity->name}} </h3>
    <br/></br/>
    
    @include('util._erros')

    <form method="POST" action="{{route('patients.store')}}">
        
        @include('institutions.patients._form')

        <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('patients.index')}}">&lArr; voltar a lista</a>
@endsection