@extends('layouts.layout')
@section('content')    

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$student->unity->institution->name}}  </h6>
  </div>
</div>

    <h4> Alteração de Aluno - Unidade {{$student->unity->name}} </h4>
    
    @include('util._erros')
    
    <form method="POST" action="{{route('students.update', ['id' => $student->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.students._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('students.index')}}">&lArr; voltar a lista</a>

@endsection