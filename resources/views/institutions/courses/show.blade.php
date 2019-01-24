@extends('layouts.layout')
@section('content')
    <h4> Universidade {{$course->unity->institution->name}}  </h4>
    <br/>
    <h4> Dados Paciente Unidade {{$course->unity->name}} </h4>
    <br/> 
    
    <form id="form-delete" style="display: none" action="{{route('courses.destroy', ['course' => $course->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$course->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th> 
                <td>{{$course->name}}</td>
            </tr>    
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('courses.edit', ['course' => $course->id ]) }}">Alterar</a>

    <a class="btn btn-danger" href="{{route('courses.destroy', ['course' => $course->id ]) }}"
           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
    >Excluir</a>

    <br/><br/>

    <a class="btn btn-default" href="{{route('courses.index')}}">&lArr; voltar a lista</a>
@endsection