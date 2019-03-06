@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Instituição    
        </div>
        @can('institutions.create')
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create" href="{{route('institutions.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>            
        @endcan

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
                        @can('institutions.edit')
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('institutions.edit', ['institution' => $institution])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        @endcan
                        @can('institutions.show')
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('institutions.show', ['institution' => $institution])}}">
                            <i class="material-icons">search</i>
                        </a>
                        @endcan
                        @can('institutions.destroy')
                        <a class="tooltipped" data-position="top" data-tooltip="Excluir" href="{{route('institutions.show', ['institution' => $institution, 'acao' =>'delete'])}}">
                            <i class="material-icons">delete</i>
                        </a>
                        @endcan
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