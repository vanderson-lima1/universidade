@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col s9">
            <div class="breadcrumb-custom">
                Instituições &sol; Unidades &sol; Cursos &sol; Disciplinas   
            </div>
        </div>
        <div class="col s3 right-align">
            <a class="waves-effect waves-light btn btn-create-custom" href="{{route('subjects.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    <div class="breadcrumb-custom">
        Instituição: {{$unity->institution->name}} / Unidade: {{$unity->name}}   
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
                        <a href="{{route('subjects.edit', ['subject' => $subject])}}">Alterar</a> |
                        <a href="{{route('subjects.show', ['subject' => $subject])}}">Ver</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>        
    @else
        <span>Nenhum registro encontrado.</span>
    @endif

@endsection