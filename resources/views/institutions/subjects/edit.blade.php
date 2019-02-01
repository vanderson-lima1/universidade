@extends('layouts.layout')
@section('content')    

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$subject->course->unity->institution->name}}  </h6>
  </div>
</div>

    <h4> Alteração de Curso Unidade {{$subject->course->unity->name}} </h4>
    
    @include('util._erros')
    
    <form method="POST" action="{{route('subjects.update', ['id' => $subject->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.subjects._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('subjects.index')}}">&lArr; voltar a lista</a>

@endsection