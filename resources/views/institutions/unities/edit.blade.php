@extends('layouts.layout')
@section('content')   

<div class="jumbotron jumbotron-fluid jumbotron-fluid-custom jumbotron-title-page-custom">
  <div class="container">
    <h6> Universidade {{$unity->institution->name}} </h6>
  </div>
</div>

    <h4> Alterar Unidade - {{$unity->name}} </h4>
    <br/>
    
    @include('util._erros')
    
    <form method="POST" action="{{route('unities.update', ['id' => $unity->id])}}">        
        {{method_field('PUT')}}

        @include('institutions.unities._form')
        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('unities.index')}}">&lArr; voltar a lista</a>

@endsection