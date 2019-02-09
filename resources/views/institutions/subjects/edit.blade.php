@extends('layouts.layout')
@section('content')    

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$subject->course->unity->institution->name}} /  Alteração de Curso Unidade {{$subject->course->unity->name}}  
        </div>
    </div>
    <br>

    @include('util._erros')
    
    <form method="POST" action="{{route('subjects.update', ['id' => $subject->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.subjects._form')
        
        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" type="submit">
                Salvar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('subjects.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection