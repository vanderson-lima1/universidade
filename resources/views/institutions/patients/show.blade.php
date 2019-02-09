@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
                Instituição {{$patient->unity->institution->name}} / Dados Paciente Unidade {{$patient->unity->name}}    
        </div>
    </div>

    <form id="form-delete" style="display: none" action="{{route('patients.destroy', ['patient' => $patient->id ]) }}" method="POST">
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
                <th>Sexo</th>
                <th>Período</th>
                <th>Telefone</th> 
                <th>CPF</th> 
                <th>RG</th> 
                <th>SUS</th>  
            </tr>    
        </thead> 
        <tbody>
            <tr>
                <td>{{$patient->id}}</td>
                <td>{{$patient->name}}</td>
                <td>{{$patient->sex == 'm' ? 'Masculino' : 'Feminino'}}</td>
                <td>{{array_values(App\Models\Patient::PERIOD)[$patient->period-1]}}</td>
                <td>{{$patient->phone}}</td>
                <td>{{$patient->documentCPF}}</td>
                <td>{{$patient->documentRG}}</td>
                <td>{{$patient->documentSUS}}</td>
            </tr>
        </tbody>
    </table>

    @php /*Verifica se a ação é para excluir e apresenta botão de alteração.*/ @endphp
    @if($acao === "delete") 
        <div class="box-button-dab">
            <a class="waves-effect waves-light btn btn-delete" href="{{route('patients.destroy', ['patient' => $patient->id ]) }}"
                    onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
                >
                Excluir
            </a>
            <a class="waves-effect waves-light btn btn-back" href="{{route('patients.index')}}"> voltar a lista</a>
        </div> 

    @else @php /* Apresenta botão de alteração */ @endphp
        
        <div class="box-button-dab">
            <a class="waves-effect waves-light btn btn-alter" href="{{route('patients.edit', ['patient' => $patient->id ]) }}">
                Alterar
            </a>
            <a class="waves-effect waves-light btn btn-back" href="{{route('patients.index')}}"> voltar a lista</a>
        </div>
    @endif   

@endsection