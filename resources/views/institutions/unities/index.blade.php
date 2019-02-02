@extends('layouts.layout')
@section('content')

    <div class="box-main-top">
        <div class="box-main-left text-custom">
            {{$institution->name}}    
        </div>
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create-custom" href="{{route('unities.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
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
        <br>
        <div class="alert-main default">Nenhuma unidade cadastrada.</div>   
    @endif

    
@endsection