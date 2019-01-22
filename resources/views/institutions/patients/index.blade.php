@extends('layouts.layout')
@section('content')
    <h1> Universidade {{$unity->institution->name}}  </h1>
    <br/></br/>
    <h3> Lista de Pacientes Unidade {{$unity->name}} </h3>
    <br/></br/>            
    <a class="btn btn-primary" href="{{route('patients.create')}}">Criar novo</a>
    <br/></br/>
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
                    <a href="{{route('patients.edit', ['patient' => $patient])}}">Editar</a>
                    <a href="{{route('patients.show', ['patient' => $patient])}}">| Ver</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection