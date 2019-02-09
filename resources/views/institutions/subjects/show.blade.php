@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Universidade {{$subject->course->unity->institution->name}} / Dados Paciente Unidade {{$subject->course->unity->name}}    
        </div>
    </div>

    <form id="form-delete" style="display: none" action="{{route('subjects.destroy', ['subject' => $subject->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>

    @php /*Verifica se a ação é para excluir e apresenta mensagem de alerta.*/ @endphp
    @if($acao === "delete") 
        <br>
        <div class="alert-main warning pulse">Atenção, essa operação é irreversível. Tenha certeza do que está prestes a fazer.</div>
    @endif

    <table class="table striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Curso</th>
            </tr>            
        </thead> 
        <tbody>
            <tr>
                <td>{{$subject->id}}</td>
                <td>{{$subject->name}}</td>
                <td>{{$subject->course->name}}</td>
            </tr>    
        </tbody>
    </table>

    @php /*Verifica se a ação é para excluir e apresenta botão de alteração.*/ @endphp
    @if($acao === "delete") 
        <div class="box-button-dab">
            <a class="waves-effect waves-light btn btn-delete" href="{{route('subjects.destroy', ['subject' => $subject->id ]) }}"
                    onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
                >
                Excluir
            </a>
            <a class="waves-effect waves-light btn btn-back" href="{{route('subjects.index')}}"> voltar a lista</a>
        </div> 

    @else @php /* Apresenta botão de alteração */ @endphp
        
        <div class="box-button-dab">
            <a class="waves-effect waves-light btn btn-alter" href="{{route('subjects.edit', ['subject' => $subject->id ]) }}">
                Alterar
            </a>
            <a class="waves-effect waves-light btn btn-back" href="{{route('subjects.index')}}"> voltar a lista</a>
        </div>
    @endif   
    
@endsection