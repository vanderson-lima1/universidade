@extends('layouts.layout')
@section('content')
    <h4> Universidade {{$unity->institution->name}}  </h4>
    <br/>
    <h4> Lista de Cursos da Unidade {{$unity->name}} </h4>
    <br/>            
    <a class="btn btn-success" href="{{route('courses.create')}}">Cadastrar</a>
    <br/><br/>

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