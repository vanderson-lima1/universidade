@extends('layouts.layout')
@section('content')
    <h4> Universidade {{$unity->institution->name}}  </h4>
    <br/>
    <h4> Lista de Pacientes Unidade {{$unity->name}} </h4>
    <br/>            
    <a class="btn btn-success" href="{{route('patients.create')}}">Cadastrar</a>
    <br/><br/>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
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
                <td>{{$patient->id}}</td>
                <td>{{$patient->name}}</td>
                <td>{{$patient->sex == 'm' ? 'Masculino' : 'Feminino'}}</td>
                <td>{{array_values(App\Models\Patient::PERIOD)[$patient->period-1]}}</td>
                <td>{{$patient->phone}}</td>
                <td>{{$patient->documentCPF}}</td>
                <td>{{$patient->documentRG}}</td>
                <td>{{$patient->documentSUS}}</td>
                <td>
                    <a href="{{route('patients.edit', ['patient' => $patient])}}">Alterar</a> |
                    <a href="{{route('patients.show', ['patient' => $patient])}}">Ver</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection