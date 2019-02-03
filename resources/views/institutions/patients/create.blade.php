@extends('layouts.layout')
@section('content') 

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$unity->institution->name}} </h6>
  </div>
</div>

    <h6> Novo Paciente - Unidade: {{$unity->name}} </h6>
    <br/>
    
    @include('util._erros')

    <form class="col s12" method="POST" action="{{route('patients.store')}}">
        
        @include('institutions.patients._form')

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('patients.index')}}">&lArr; voltar a lista</a>
@endsection