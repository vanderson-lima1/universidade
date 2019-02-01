@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col s9">
            <div class="breadcrumb-custom">
                Instituições &sol; Unidades  &sol;
            </div>
        </div>
        <div class="col s3 right-align">
            <a class="waves-effect waves-light btn btn-create-custom" href="{{route('unities.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    <div class="breadcrumb-custom">
        Instituição:    
    </div>

    @if (count($unities))
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th>                 
                    <th>Universidade</th> 
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($unities as $unity)
                <tr>
                    <td>{{$unity->name}}</td>
                    <td>{{$unity->institution->name}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('unities.edit', ['unity' => $unity])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('unities.show', ['unity' => $unity])}}">
                            <i class="material-icons">search</i>
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