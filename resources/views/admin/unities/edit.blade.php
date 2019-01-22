@extends('layouts.layout')
@section('content')    
    <h1> Universidade {{$unity->institution->name}}  </h1>
    <br/></br/>
    <h3> Alteração Cadastro Paciente Unidade {{$unity->name}} </h3>
    <br/></br/> 
    
    @include('util._erros')
    
    <form method="POST" action="{{route('unities.update', ['id' => $unity->id])}}">        
        {{method_field('PUT')}}

        @include('admin.unities._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('unities.index')}}">&lArr; voltar a lista</a>

@endsection