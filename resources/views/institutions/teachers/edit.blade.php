@extends('layouts.layout')
@section('content')    

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$teacher->unity->institution->name}}  </h6>
  </div>
</div>

    <h4> Alteração de Professor - Unidade {{$teacher->unity->name}} </h4>
    
    @include('util._erros')
    
    <form method="POST" action="{{route('teachers.update', ['id' => $teacher->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.teachers._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('teachers.index')}}">&lArr; voltar a lista</a>

@endsection