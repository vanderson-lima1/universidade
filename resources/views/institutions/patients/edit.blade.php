@extends('layouts.layout')
@section('content')  

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$patient->unity->institution->name}} / Alteração Cadastro Paciente Unidade {{$patient->unity->name}}   
        </div>
    </div>
    <br>

    @include('util._erros')
    
    <form id="formPatientsAlter" method="POST" action="{{route('patients.update', ['id' => $patient->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.patients._form')
        
        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Salvar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('patients.index')}}"> voltar a lista</a>
        </div>
      
    </form>

@endsection