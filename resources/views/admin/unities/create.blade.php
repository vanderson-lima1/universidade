@extends('layouts.layout')
@section('content')   
    <h1> Administrativo </h1>
    <br/></br/>
    <h3> Nova Unidade </h3>
    <br/></br/>
    
    @include('util._erros')

    <form method="POST" action="{{route('unities.store')}}">
        
        @include('admin.unities._form')

        <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('unities.index')}}">&lArr; voltar a lista</a>
@endsection