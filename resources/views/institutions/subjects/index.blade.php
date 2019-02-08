@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            {{$unity->institution->name}} &sol; {{$unity->name}}  
        </div>
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create" href="{{route('subjects.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    @if (count($subjects))
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th> 
                    <th>Curso</th>                
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
             
                @foreach ($subjects as $subject)
                <tr>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->course->name}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('subjects.edit', ['subject' => $subject])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('subjects.show', ['subject' => $subject])}}">
                            <i class="material-icons">search</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Excluir" href="{{route('subjects.show', ['subject' => $subject, 'acao' =>'delete'])}}">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>        
    @else
        <br>
        <div class="alert-main default">Nenhuma disciplina/matéria cadastrada.</div>
    @endif

@endsection