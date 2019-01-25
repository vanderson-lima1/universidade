@extends('layouts.layout')
@section('content')

<div class="row">
    <div class="col-lg-10 col-md-6">
        <div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
            <div class="container">
                <h6> Pacientes </h6>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6">
        <a class="btn btn-success btn-1-custom p-1 my-1" href="{{route('patients.create')}}">
            <i class="material-icons centralizado">person_add</i>Cadastrar
        </a>
    </div>
</div>

    <h6>Instituição: {{$unity->institution->name}} / Unidade: {{$unity->name}} </h6>
    <br/>            
    
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