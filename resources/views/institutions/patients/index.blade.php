@extends('layouts.layout')
@section('content')

    <div class="row">
        <div class="col s9">
            <div class="breadcrumb-custom">
                Instituições &sol; Unidades &sol; Pacientes  
            </div>
        </div>
        <div class="col s3 right-align">
            <a class="waves-effect waves-light btn btn-create-custom" href="{{route('patients.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    <div class="breadcrumb-custom">
        Instituição: {{$unity->institution->name}} / Unidade: {{$unity->name}}   
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
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    @else 
        <span>Nenhum registro encontrado.</span>
    @endif

@endsection