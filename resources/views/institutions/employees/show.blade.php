@extends('layouts.layout')
@section('content')
    <h4> Universidade {{$employee->unity->institution->name}}  </h4>
    <br/>
    <h4> Funcionário {{$employee->unity->name}} </h4>
    <br/> 
    
    <form id="form-delete" style="display: none" action="{{route('employees.destroy', ['employee' => $employee->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$employee->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th> 
                <td>{{$employee->name}}</td>
            </tr>    
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('employees.edit', ['employee' => $employee->id ]) }}">Alterar</a>

    <a class="btn btn-danger" href="{{route('employees.destroy', ['employee' => $employee->id ]) }}"
           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
    >Excluir</a>

    <br/><br/>

    <a class="btn btn-default" href="{{route('employees.index')}}">&lArr; voltar a lista</a>
@endsection