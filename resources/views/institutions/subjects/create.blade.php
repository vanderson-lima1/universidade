@extends('layouts.layout')
@section('content')  

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$unity->institution->name}} </h6>
  </div>
</div>

    <h6> Nova Disciplina - Unidade: {{$unity->name}} </h6>
    <br/>
    
    @include('util._erros')

    <form method="POST" action="{{route('subjects.store')}}">
        
        @include('institutions.subjects._form')

        <br> </br>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('subjects.index')}}">&lArr; voltar a lista</a>
@endsection