@extends('layouts.layout')
@section('content')
    <h4> Universidade {{$teacher->unity->institution->name}}  </h4>
    <br/>
    <h4> Professor {{$teacher->unity->name}} </h4>
    <br/> 
    
    <form id="form-delete" style="display: none" action="{{route('teachers.destroy', ['teacher' => $teacher->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$teacher->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th> 
                <td>{{$teacher->name}}</td>
            </tr>    
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('teachers.edit', ['teacher' => $teacher->id ]) }}">Alterar</a>

    <a class="btn btn-danger" href="{{route('teachers.destroy', ['teacher' => $teacher->id ]) }}"
           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
    >Excluir</a>

    <br/><br/>

    <a class="btn btn-default" href="{{route('teachers.index')}}">&lArr; voltar a lista</a>
@endsection