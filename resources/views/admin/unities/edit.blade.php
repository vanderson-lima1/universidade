@extends('layouts.layout')
@section('content')    
    <h4> Universidade {{$unity->institution->name}}  </h4>
    <br/>
    <h4> Alterar Unidade - {{$unity->name}} </h4>
    <br/>
    
    @include('util._erros')
    
    <form method="POST" action="{{route('unities.update', ['id' => $unity->id])}}">        
        {{method_field('PUT')}}

        @include('admin.unities._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('unities.index')}}">&lArr; voltar a lista</a>

@endsection