@extends('layouts.layout')
@section('content')    

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Nova Instituição  </h6>
  </div>
</div>
    
    @include('util._erros')

    <form method="POST" action="{{route('institutions.store')}}">
        
        @include('admin.institutions._form')

        <button type="submit" class="btn btn-success ">Cadastrar</button>
    </form>
    <a class="btn btn-default" href="{{route('institutions.index')}}">&lArr; voltar a lista</a>
@endsection