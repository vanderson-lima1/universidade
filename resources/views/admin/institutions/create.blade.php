@extends('layouts.layout')
@section('content')    
    <br/></br/>
    <h3> Nova Universidade </h3>
    <br/></br/>
    
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif    

    <form method="POST" action="{{route('institutions.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" id="name" name="name">
        </div>  
        <button type="submit" class="btn btn-default">Enviar</button>
    </form>
    <a class="btn btn-default" href="{{route('institutions.index')}}">&lArr; voltar a lista</a>
@endsection