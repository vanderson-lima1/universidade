@extends('layouts.layout')
@section('content')    
    <br/></br/>
    <h3> Alterar Universidade </h3>
    <br/></br/>
    
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif        
    
    <form method="POST" action="{{route('institutions.update', ['id' => $institution->id])}}">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="form-group">
            <label for="name">Nome</label>
        <input class="form-control" id="name" name="name" value="{{$institution->name}}">
        </div>  
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>

    <a class="btn btn-default" href="{{route('institutions.index')}}">&lArr; voltar a lista</a>

@endsection