@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-lg-10 col-md-6">
        <div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
            <div class="container">
                <h6> Disciplinas </h6>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6">
        <a class="btn btn-success btn-1-custom p-1 my-1" href="{{route('subjects.create')}}">
            <i class="material-icons centralizado">person_add</i>Cadastrar
        </a>
    </div>
</div>

    <h6>Instituição: {{$unity->institution->name}} / Unidade: {{$unity->name}}</h6>
    <br/>            

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th> 
                <th>Curso</th>                
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{$subject->id}}</td>
                <td>{{$subject->name}}</td>
                <td>{{$subject->course->name}}</td>
                <td>
                    <a href="{{route('subjects.edit', ['subject' => $subject])}}">Alterar</a> |
                    <a href="{{route('subjects.show', ['subject' => $subject])}}">Ver</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection