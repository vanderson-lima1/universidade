@extends('layouts.layout')
@section('content')    

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$teacher->unity->institution->name}} / Alteração de Professor - Unidade {{$teacher->unity->name}} 
        </div>
    </div>
    <br>

    @include('util._erros')
    
    <form id="formTeachersAlter" method="POST" action="{{route('teachers.update', ['id' => $teacher->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.teachers._form')
        
        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Salvar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('teachers.index')}}"> voltar a lista</a>
        </div>
      
    </form>

@endsection