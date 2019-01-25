@extends('layouts.layout')
@section('content')

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Instituição {{$patient->unity->institution->name}}  </h6>
  </div>
</div>

    <h4> Dados Paciente Unidade {{$patient->unity->name}} </h4>
    <br/> 
    
    <form id="form-delete" style="display: none" action="{{route('patients.destroy', ['patient' => $patient->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

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

    <a class="btn btn-primary" href="{{route('patients.edit', ['patient' => $patient->id ]) }}">Alterar</a>

    <a class="btn btn-danger" href="{{route('patients.destroy', ['patient' => $patient->id ]) }}"
    onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
>Excluir</a>

    <br/><br/>

    <a class="btn btn-default" href="{{route('patients.index')}}">&lArr; voltar a lista</a>
@endsection