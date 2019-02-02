@extends('layouts.layout')
@section('content')

    <div class="box-main-top">
        <div class="box-main-left text-custom">
            {{$unity->institution->name}} &sol; {{$unity->name}}  
        </div>
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create-custom" href="{{route('students.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    @if (count($students))
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th>                 
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->name}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('students.edit', ['student' => $student])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('students.show', ['student' => $student])}}">
                            <i class="material-icons">search</i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    @else  
        <br>
        <div class="alert-main default">Nenhum aluno cadastrado.</div>
    @endif

@endsection