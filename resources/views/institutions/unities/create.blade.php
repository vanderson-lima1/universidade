@extends('layouts.layout')
@section('content')   
    <h4> Nova Unidade </h4>
    <br/>
    
    @include('util._erros')

    <form method="POST" action="{{route('unities.store')}}">
        
        @include('institutions.unities._form')

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('unities.index')}}">&lArr; voltar a lista</a>
@endsection