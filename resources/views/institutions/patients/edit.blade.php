@extends('layouts.layout')
@section('content')    
    <h1> Universidade {{$patient->unity->institution->name}}  </h1>
    <br/></br/>
    <h3> Alteração Cadastro Paciente Unidade {{$patient->unity->name}} </h3>
    <br/></br/> 
    
    @include('util._erros')
    
    <form method="POST" action="{{route('patients.update', ['id' => $patient->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.patients._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('patients.index')}}">&lArr; voltar a lista</a>

@endsection