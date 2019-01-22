@extends('layouts.layout')
@section('content')
    <h1> Universidade {{$patient->unity->institution->name}}  </h1>
    <br/></br/>
    <h3> Dados Paciente Unidade {{$patient->unity->name}} </h3>
    <br/></br/> 
    
    <a class="btn btn-primary" href="{{route('patients.edit', ['patient' => $patient->id ]) }}">Editar</a>

    <a class="btn btn-danger" href="{{route('patients.destroy', ['patient' => $patient->id ]) }}"
        onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
    >Excluir</a>
    <form id="form-delete" style="display: none" action="{{route('patients.destroy', ['patient' => $patient->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    <br/></br/>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$patient->id}}</td>
            </tr>
            <tr>
                <th scope="row">Nome</th> 
                <td>{{$patient->name}}</td>
            </tr>    
            <tr>
                <th scope="row">Sexo</th> 
                <td>{{$patient->sex == 'm' ? 'Masculino' : 'Feminino'}}</td>
            </tr>
            <tr>
                <th scope="row">Período</th> 
                <td>{{array_values(App\Models\Patient::PERIOD)[$patient->period-1]}}</td>
            </tr>    
            <tr>
                <th scope="row">Telefone</th> 
                <td>{{$patient->phone}}</td>
            </tr>    
            <tr>
                <th scope="row">CPF</th> 
                <td>{{$patient->documentCPF}}</td>
            </tr>    
            <tr>
                <th scope="row">RG</th> 
                <td>{{$patient->documentRG}}</td>
            </tr>    
            <tr>
                <th scope="row">SUS</th> 
                <td>{{$patient->documentSUS}}</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-default" href="{{route('patients.index')}}">&lArr; voltar a lista</a>
@endsection