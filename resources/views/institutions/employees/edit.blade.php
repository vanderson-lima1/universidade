@extends('layouts.layout')
@section('content')    

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$employee->unity->institution->name}} / Alteração de Funcionário - Unidade {{$employee->unity->name}}   
        </div>
    </div>
    <br>

    @include('util._erros')
    
    <form method="POST" action="{{route('employees.update', ['id' => $employee->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.employees._form')
        
        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" type="submit">
                Confirmar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('employees.index')}}"> voltar a lista</a>
        </div>
      
    </form>

@endsection