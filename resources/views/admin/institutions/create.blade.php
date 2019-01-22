@extends('layouts.layout')
@section('content')    

    <h4> Nova Universidade </h4>
    <br/>
    
    @include('util._erros')

    <form method="POST" action="{{route('institutions.store')}}">
        
        @include('admin.institutions._form')

        <button type="submit" class="btn btn-success ">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('institutions.index')}}">&lArr; voltar a lista</a>
@endsection