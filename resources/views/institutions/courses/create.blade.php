@extends('layouts.layout')
@section('content')   
    <h4> Universidade {{$unity->institution->name}}  </h4>
    <br/>
    <h4> Novo Paciente Unidade {{$unity->name}} </h4>
    <br/>
    
    @include('util._erros')

    <form method="POST" action="{{route('courses.store')}}">
        
        @include('institutions.courses._form')

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('courses.index')}}">&lArr; voltar a lista</a>
@endsection