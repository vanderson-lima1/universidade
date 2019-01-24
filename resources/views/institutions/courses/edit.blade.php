@extends('layouts.layout')
@section('content')    
    <h4> Universidade {{$course->unity->institution->name}}  </h4>
    <br/>
    <h4> Alteração de Curso Unidade {{$course->unity->name}} </h4>
    <br/> 
    
    @include('util._erros')
    
    <form method="POST" action="{{route('courses.update', ['id' => $course->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.courses._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('courses.index')}}">&lArr; voltar a lista</a>

@endsection