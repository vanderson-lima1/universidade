@extends('layouts.layout')
@section('content')
    <br/></br/>
    <h3> Detalhe Universidade </h3>
    <br/></br/>
    
    <a class="btn btn-primary" href="{{route('institutions.edit', ['institution' => $institution->id ]) }}">Editar</a>

    <a class="btn btn-danger" href="{{route('institutions.destroy', ['institution' => $institution->id ]) }}"
        onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
    >Excluir</a>
    <form id="form-delete" style="display: none" action="{{route('institutions.destroy', ['institution' => $institution->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    <br/></br/>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$institution->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th> 
                <td>{{$institution->name}}</td>
            </tr>    
        </tbody>
    </table>
    <a class="btn btn-default" href="{{route('institutions.index')}}">&lArr; voltar a lista</a>
@endsection