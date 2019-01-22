@extends('layouts.layout')
@section('content')
    <br/></br/>
    <h3> Lista de Unidades</h3>
    <br/></br/>            
    <a class="btn btn-primary" href="{{route('unities.create')}}">Criar nova</a>
    <br/></br/>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>                 
                <th>Universidade</th> 
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unities as $unity)
            <tr>
                <td>{{$unity->id}}</td>
                <td>{{$unity->name}}</td>
                <td>{{$unity->institution->name}}</td>
                <td>
                    <a href="{{route('unities.edit', ['unity' => $unity])}}">Editar</a>
                    <a href="{{route('unities.show', ['unity' => $unity])}}">| Ver</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection