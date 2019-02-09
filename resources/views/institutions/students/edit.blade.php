@extends('layouts.layout')
@section('content')    

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$student->unity->institution->name}} / Alteração de Aluno - Unidade {{$student->unity->name}}    
        </div>
    </div>
    <br>

    @include('util._erros')
    
    <form method="POST" action="{{route('students.update', ['id' => $student->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.students._form')
        
        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" type="submit">
                Salvar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('students.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection