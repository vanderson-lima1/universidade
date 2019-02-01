@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col s9">
            <div class="breadcrumb-custom">
                Instituições  
            </div>
        </div>
        <div class="col s3 right-align">
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
        <span>Nenhum registro encontrado.</span>    
    @endif
    
@endsection