@extends('layouts.layout')
@section('content')

    <div class="box-main-top">
        <div class="box-main-left text-custom">
            Instituição    
        </div>
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create-custom" href="{{route('institutions.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    @if (count($institutions)) 
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th> 
                    <th>Ação</th>                
                </tr>
            </thead>
            <tbody>

                @foreach ($institutions as $institution)
                <tr>
                    <td>{{$institution->name}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('institutions.edit', ['institution' => $institution])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('institutions.show', ['institution' => $institution])}}">
                            <i class="material-icons">search</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Excluir" href="{{route('institutions.show', ['institution' => $institution])}}">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach 

            </tbody>        
        </table>    
    @else
        <br>
        <div class="alert-main default">Nenhuma instituição cadastrada.</div>
    @endif
    
@endsection