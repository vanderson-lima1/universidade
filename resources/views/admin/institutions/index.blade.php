@extends('layouts.layout')
@section('content')

    <h4> Lista de Universidades </h4>
    <br/>
    <a class="btn btn-success" href="{{route('institutions.create')}}">Cadastrar</a>
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
            @foreach ($institutions as $institution)
            <tr>
                <td>{{$institution->id}}</td>
                <td>{{$institution->name}}</td>
                <td>
                    <a href="{{route('institutions.edit', ['institution' => $institution])}}">Alterar</a> | 
                    <a href="{{route('institutions.show', ['institution' => $institution])}}">Ver</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection