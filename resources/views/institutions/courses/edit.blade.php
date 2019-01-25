@extends('layouts.layout')
@section('content')    

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$patient->unity->institution->name}}  </h6>
  </div>
</div>

    <h4> Alteração de Curso Unidade {{$course->unity->name}} </h4>
    
    @include('util._erros')
    
    <form method="POST" action="{{route('courses.update', ['id' => $course->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.courses._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('courses.index')}}">&lArr; voltar a lista</a>

@endsection