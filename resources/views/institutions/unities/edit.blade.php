@extends('layouts.layout')
@section('content')   

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$unity->institution->name}} / Alterar Unidade - {{$unity->name}} 
        </div>
    </div>
    <br>

    @include('util._erros')
    
    <form id="formUnitiesAlter" method="POST" action="{{route('unities.update', ['id' => $unity->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.unities._form')
        
        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Salvar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('unities.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection