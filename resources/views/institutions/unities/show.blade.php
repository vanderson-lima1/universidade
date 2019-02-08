@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
                Instituição {{$unity->institution->name}} / Dados Paciente Unidade {{$unity->name}} 
        </div>
    </div>

    <form id="form-delete" style="display: none" action="{{route('unities.destroy', ['unity' => $unity->id ]) }}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>
    
    @php /*Verifica se a ação é para excluir e apresenta mensagem de alerta.*/ @endphp
    @if($acao === "delete") 
        <br>
        <div class="alert-main warning">Atenção, essa operação é irreversível. Tenha certeza do que está prestes a fazer.</div>
    @endif

    <table class="table striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Faculdade</th>
            </tr>
        </thead>         
        <tbody>
            <tr>
                <td>{{$unity->id}}</td>
                <td>{{$unity->name}}</td>
                <td>{{$unity->institution->name}}</td>
            </tr>
        </tbody>
    </table>
 
    @php /*Verifica se a ação é para excluir e apresenta botão de alteração.*/ @endphp
    @if($acao === "delete") 
        <div class="box-button-dab">
            <a class="waves-effect waves-light btn btn-delete" href="{{route('unities.destroy', ['unity' => $unity->id ]) }}"
                    onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
                >
                Excluir
            </a>
            <a class="waves-effect waves-light btn btn-back" href="{{route('unities.index')}}"> voltar a lista</a>
        </div> 

    @else @php /* Apresenta botão de alteração */ @endphp
        
        <div class="box-button-dab">
            <a class="waves-effect waves-light btn btn-alter" href="{{route('unities.edit', ['unity' => $unity->id ]) }}">
                Alterar
            </a>
            <a class="waves-effect waves-light btn btn-back" href="{{route('unities.index')}}"> voltar a lista</a>
        </div>
    @endif   

@endsection