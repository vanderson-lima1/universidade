@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-lg-10 col-md-6">
        <div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
            <div class="container">
                <h6> Unidades </h6>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6">
    <a class="btn btn-success btn-1-custom p-1 my-1" href="{{route('unities.create')}}">
            <i class="material-icons centralizado">person_add</i>Cadastrar
        </a>
    </div>
</div>

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