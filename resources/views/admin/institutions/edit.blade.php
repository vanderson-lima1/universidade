@extends('layouts.layout')
@section('content')    

    <h4> Alterar Universidade </h4>
    <br/>

    @include('util._erros')
    
    <form method="POST" action="{{route('institutions.update', ['id' => $institution->id])}}">        
        {{method_field('PUT')}}

        @include('admin.institutions._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('institutions.index')}}">&lArr; voltar a lista</a>

@endsection