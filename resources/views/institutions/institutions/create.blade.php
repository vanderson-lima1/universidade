@extends('layouts.layout')
@section('content')    

  <div class="container-main-top">
      <div class="box-main-left text-custom">
          Nova Instituição    
      </div>
  </div>

  <br>
    
    @include('util._erros')

    <form method="POST" action="{{route('institutions.store')}}">
        
        @include('institutions.institutions._form')

        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" type="submit">
                Cadastrar
            </button>
            <a class="waves-effect waves-light btn btn-back" href="{{route('institutions.index')}}"> voltar a lista</a>
        </div>

    </form>

@endsection