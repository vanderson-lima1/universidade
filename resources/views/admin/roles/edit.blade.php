@extends('layouts.layout')
@section('content')    

  <div class="container-main-top">
      <div class="box-main-left text-custom">
          Alterar Perfil   
      </div>
  </div>
  <br>

    @include('util._erros')

    <form id="formAlter" method="POST" action="{{route('roles.update', ['id' => $role->id])}}">        
        {{method_field('PUT')}}

        @include('admin.roles._form')

        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Salvar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('roles.index')}}"> voltar a lista</a>
        </div>        

    </form>

@endsection