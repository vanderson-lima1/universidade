@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-lg-10 col-md-6">
        <div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
            <div class="container">
                <h6> Cursos </h6>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6">
        <a class="btn btn-success btn-1-custom p-1 my-1" href="{{route('courses.create')}}">
            <i class="material-icons centralizado">person_add</i>Cadastrar
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
                    <a href="{{route('courses.edit', ['course' => $course])}}">Alterar</a> |
                    <a href="{{route('courses.show', ['course' => $course])}}">Ver</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection