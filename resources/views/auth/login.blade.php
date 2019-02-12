@extends('home')
@section('content')  

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Home / Login
        </div>
    </div>
    <br>

    @include('util._erros')

    <form method="POST" action="{{route('login')}}">        

            {{csrf_field()}}
            <div class="row input field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
               <label for="email">Email</label>
               <input class="form-control" type="text" id="email" name="email" value="{{old('email')}}" required autofocus>
            </div>  

            <div class="row input field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Senha</label>
                    <input class="form-control" type="password" id="password" name="password" value="{{old('password')}}" required>
            </div>  
     

        <div class="box-button-dab">
            <button class="waves-effect waves-light btn btn-create" type="submit">
                Login
            </button>
            <a class="waves-effect waves-light btn btn-back" href="/home"> Home</a>
        </div>

    </form>

@endsection