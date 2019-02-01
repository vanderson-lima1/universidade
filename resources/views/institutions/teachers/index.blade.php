@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col s9">
            <div class="breadcrumb-custom">
                Instituições &sol; Unidades &sol; Professores  
            </div>
        </div>
        <div class="col s3 right-align">
            <a class="waves-effect waves-light btn btn-create-custom" href="{{route('courses.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    <div class="breadcrumb-custom">
        Instituição:    
    </div>
    
    @if (count($teachers))
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th>                 
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($teachers as $teacher)
                <tr>
                    <td>{{$teacher->name}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('courses.edit', ['course' => $course])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('courses.show', ['course' => $course])}}">
                            <i class="material-icons">search</i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    @else  
        <tr>
            <span>Nenhum registro encontrado.</span>
        </tr> 
    @endif

@endsection