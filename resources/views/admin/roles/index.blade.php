@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Perfil   
        </div>
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create" href="{{route('roles.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    @if (count($roles)) 
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th> 
                    <th>Ação</th>                
                </tr>
            </thead>
            <tbody>

                @foreach ($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('roles.edit', ['role' => $role])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('roles.show', ['role' => $role])}}">
                            <i class="material-icons">search</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Excluir" href="{{route('roles.show', ['role' => $role, 'acao' =>'delete'])}}">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach 

            </tbody>        
        </table>    
    @else
        <br>
        <div class="alert-main default">Nenhum perfil cadastrado.</div>
    @endif
    
@endsection