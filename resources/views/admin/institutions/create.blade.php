@extends('layouts.layout')
@section('content')    
    <br/></br/>
    <h3> Nova Universidade </h3>
    <br/></br/>
    
    @include('util._erros')

    <form method="POST" action="{{route('institutions.store')}}">
        
        @include('admin.institutions._form')

        <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('institutions.index')}}">&lArr; voltar a lista</a>
@endsection