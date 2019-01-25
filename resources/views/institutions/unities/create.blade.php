@extends('layouts.layout')
@section('content')   

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Nova Unidade </h6>
  </div>
</div>

    @include('util._erros')

    <form method="POST" action="{{route('unities.store')}}">
        
        @include('institutions.unities._form')

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('unities.index')}}">&lArr; voltar a lista</a>
@endsection