@extends('layouts.layout')
@section('content')

    <h4> Lista de Unidades</h4>
    <br/>

    <a class="btn btn-success" href="{{route('unities.create')}}">Cadastrar</a>
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
                    <a href="{{route('unities.edit', ['unity' => $unity])}}">Alterar</a> |
                    <a href="{{route('unities.show', ['unity' => $unity])}}">Ver</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection