@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            {{$unity->institution->name}} &sol; {{$unity->name}}   
        </div>
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create" href="{{route('patients.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    @if (count($patients))
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th>                 
                    <th>Sexo</th> 
                    <th>Período</th> 
                    <th>Fone</th>                
                    <th>CPF</th>
                    <th>RG</th>
                    <th>SUS</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($patients as $patient)
                <tr>
                    <td>{{$patient->name}}</td>
                    <td>{{$patient->sex == 'm' ? 'Masculino' : 'Feminino'}}</td>
                    <td>{{array_values(App\Models\Patient::PERIOD)[$patient->period-1]}}</td>
                    <td>{{$patient->phone}}</td>
                    <td>{{$patient->documentCPF}}</td>
                    <td>{{$patient->documentRG}}</td>
                    <td>{{$patient->documentSUS}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('patients.edit', ['patient' => $patient])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('patients.show', ['patient' => $patient])}}">
                            <i class="material-icons">search</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Excluir" href="{{route('patients.show', ['patient' => $patient, 'acao' =>'delete'])}}">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    @else 
        <br>
        <div class="alert-main default">Nenhum paciente cadastrado.</div>
    @endif

@endsection