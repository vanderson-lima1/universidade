@extends('layouts.layout')
@section('content')
    <h1> Universidade {{$unity->institution->name}}  </h1>
    <br/></br/>
    <h3> Dados Paciente Unidade {{$unity->name}} </h3>
    <br/></br/> 
    
    <a class="btn btn-primary" href="{{route('unities.edit', ['unity' => $unity->id ]) }}">Editar</a>

    <a class="btn btn-danger" href="{{route('unities.destroy', ['unity' => $unity->id ]) }}"
        onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
    >Excluir</a>
    <form id="form-delete" style="display: none" action="{{route('unities.destroy', ['unity' => $unity->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    <br/></br/>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$unity->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th> 
                <td>{{$unity->name}}</td>
            </tr>    
            <tr>
                <th scope="row">Faculdade</th> 
                <td>{{$unity->institution->name}}</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-default" href="{{route('unities.index')}}">&lArr; voltar a lista</a>
@endsection