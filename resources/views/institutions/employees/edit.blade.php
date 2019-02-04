@extends('layouts.layout')
@section('content')    

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$employee->unity->institution->name}}  </h6>
  </div>
</div>

    <h4> Alteração de Funcionário - Unidade {{$employee->unity->name}} </h4>
    
    @include('util._erros')
    
    <form method="POST" action="{{route('employees.update', ['id' => $employee->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.employees._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('employees.index')}}">&lArr; voltar a lista</a>

@endsection