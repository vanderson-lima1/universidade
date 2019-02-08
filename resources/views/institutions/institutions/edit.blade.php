@extends('layouts.layout')
@section('content')    

  <div class="container-main-top">
      <div class="box-main-left text-custom">
          Alterar Instituição    
      </div>
  </div>
  <br>

    @include('util._erros')

    <form method="POST" action="{{route('institutions.update', ['id' => $institution->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.institutions._form')

        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" type="submit">
                Confirmar alteração
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('institutions.index')}}"> voltar a lista</a>
        </div>        

    </form>

@endsection