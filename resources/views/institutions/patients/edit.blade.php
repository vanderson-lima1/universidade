@extends('layouts.layout')
@section('content')  

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$patient->unity->institution->name}}  </h6>
  </div>
</div>

    <h4> Alteração Cadastro Paciente Unidade {{$patient->unity->name}} </h4>
    <br/> 
    
    @include('util._erros')
    
    <form method="POST" action="{{route('patients.update', ['id' => $patient->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.patients._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('patients.index')}}">&lArr; voltar a lista</a>

@endsection