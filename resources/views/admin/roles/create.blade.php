@extends('layouts.layout')
@section('content')    

  <div class="container-main-top">
      <div class="box-main-left text-custom">
          Novo Perfil   
      </div>
  </div>

  <br>
    
    @include('util._erros')

    <form id="formCreate" method="POST" action="{{route('roles.store')}}">
        
        @include('admin.roles._form')

        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" id="btnSubmit" type="submit">
                Cadastrar
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('roles.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection