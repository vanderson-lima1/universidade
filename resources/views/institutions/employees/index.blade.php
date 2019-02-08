@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            {{$unity->institution->name}} &sol; {{$unity->name}}  
        </div>
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create" href="{{route('employees.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    @if (count($employees))
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th>                 
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('employees.edit', ['employee' => $employee])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('employees.show', ['employee' => $employee])}}">
                            <i class="material-icons">search</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Excluir" href="{{route('employees.show', ['employee' => $employee, 'acao' =>'delete'])}}">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    @else  
        <br>
        <div class="alert-main default">Nenhum professor cadastrado.</div>
    @endif

@endsection