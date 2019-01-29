@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col s9">
            <div class="breadcrumb-custom">
                Instituições &sol; Unidades &sol; Cursos  
            </div>
        </div>
        <div class="col s3 right-align">
            <a class="waves-effect waves-light btn btn-create-custom" href="{{route('courses.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    <h6>Instituição: {{$unity->institution->name}} / Curso: {{$unity->name}} </h6>
    <br/>            

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>                 
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{$course->id}}</td>
                <td>{{$course->name}}</td>
                <td>
                    <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('courses.edit', ['course' => $course])}}">
                        <i class="material-icons">edit</i>
                    </a>
                    <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('courses.show', ['course' => $course])}}">
                        <i class="material-icons">search</i>
                    </a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection