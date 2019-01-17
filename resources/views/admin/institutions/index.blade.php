@extends('layouts.layout')
@section('content')
    <br/></br/>
    <h3> Lista de Universidades </h3>
    <br/></br/>
    <a class="btn btn-primary" href="{{route('institutions.create')}}">Criar nova</a>
    <br/></br/>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th> 
                <th>Ação</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($institutions as $institution)
            <tr>
                <td>{{$institution->id}}</td>
                <td>{{$institution->name}}</td>
                <td>
                    <a href="{{route('institutions.edit', ['institution' => $institution])}}">Editar</a>
                    <a href="{{route('institutions.show', ['institution' => $institution])}}">| Ver</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection