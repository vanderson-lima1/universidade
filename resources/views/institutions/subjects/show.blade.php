@extends('layouts.layout')
@section('content')
    <h4> Universidade {{$subject->course->unity->institution->name}}  </h4>
    <br/>
    <h4> Dados Paciente Unidade {{$subject->course->unity->name}} </h4>
    <br/> 
    
    <form id="form-delete" style="display: none" action="{{route('subjects.destroy', ['subject' => $subject->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$subject->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th> 
                <td>{{$subject->name}}</td>
            </tr>    
            <tr>
                <th scope="row">Curso</th> 
                <td>{{$subject->course->name}}</td>
            </tr>    
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('subjects.edit', ['subject' => $subject->id ]) }}">Alterar</a>

    <a class="btn btn-danger" href="{{route('subjects.destroy', ['subject' => $subject->id ]) }}"
           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
    >Excluir</a>

    <br/><br/>

    <a class="btn btn-default" href="{{route('subjects.index')}}">&lArr; voltar a lista</a>
@endsection