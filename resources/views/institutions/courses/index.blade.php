@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
                {{$unity->institution->name}} &sol; {{$unity->name}}    
        </div>
        <div class="box-main-right">
            <a class="waves-effect waves-light btn btn-create {{$habilitarBotao ? '' : 'disabled'}}" href="{{route('courses.create')}}">
                <i class="material-icons sm left">person_add</i>Cadastrar
            </a>
        </div>
    </div>

    @php /* Apresenta mensagem de SUCESSO de acordo com ação do usuário. */ @endphp
    @if($acao === "inclusao") 
        <br>
        <div id="mensagemDeConfirmacao" class="alert-main success pulse">Cadastro efetuado com sucesso.</div>
    @endif

    @if($acao === "alteracao") 
        <br>
        <div id="mensagemDeConfirmacao" class="alert-main success pulse">Alteração efetuada com sucesso.</div>
    @endif

    @if($acao === "exclusao") 
        <br>  
        <div id="mensagemDeConfirmacao" class="alert-main success pulse">Exclusão efetuada com sucesso.</div>
    @endif

    @if (count($courses)) 
        <table class="table striped">
            <thead>
                <tr>
                    <th>Nome</th> 
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($courses as $course)
                <tr>
                    <td>{{$course->name}}</td>
                    <td>
                        <a class="tooltipped" data-position="top" data-tooltip="Alterar" href="{{route('courses.edit', ['course' => $course])}}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Visualizar" href="{{route('courses.show', ['course' => $course])}}">
                            <i class="material-icons">search</i>
                        </a>
                        <a class="tooltipped" data-position="top" data-tooltip="Excluir" href="{{route('courses.show', ['course' => $course, 'acao' =>'delete'])}}">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>        
    @else
        <br>
        <div class="alert-main default">Nenhum curso cadastrado.</div>
    @endif

@endsection