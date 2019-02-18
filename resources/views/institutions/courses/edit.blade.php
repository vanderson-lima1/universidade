@extends('layouts.layout')
@section('content')    

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$course->unity->institution->name}} / Alteração de Curso Unidade {{$course->unity->name}}   
        </div>
    </div>
    <br>

    @include('util._erros')
    
    <form id="formCoursesAlter" method="POST" action="{{route('courses.update', ['id' => $course->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.courses._form')
        
        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Salvar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('courses.index')}}"> voltar a lista</a>
        </div>        

    </form>

@endsection