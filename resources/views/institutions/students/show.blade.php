@extends('layouts.layout')
@section('content')
    <h4> Universidade {{$student->unity->institution->name}}  </h4>
    <br/>
    <h4> Aluno {{$student->unity->name}} </h4>
    <br/> 
    
    <form id="form-delete" style="display: none" action="{{route('students.destroy', ['student' => $student->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$student->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th> 
                <td>{{$student->name}}</td>
            </tr>    
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('students.edit', ['student' => $student->id ]) }}">Alterar</a>

    <a class="btn btn-danger" href="{{route('students.destroy', ['student' => $student->id ]) }}"
           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
    >Excluir</a>

    <br/><br/>

    <a class="btn btn-default" href="{{route('students.index')}}">&lArr; voltar a lista</a>
@endsection