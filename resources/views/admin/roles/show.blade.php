@extends('layouts.layout')
@section('content')

    <div class="container-main-top">
        <div class="box-main-left text-custom">
            Perfil    
        </div>
    </div>

    <form id="form-delete" style="display: none" action="{{route('roles.destroy', ['role' => $role->id ]) }}" method="POST">
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
                <th>Nome</th>
            </tr>
        </thead> 
        <tbody>
            <tr>
                <td>{{$role->name}}</td>
            </tr>    
        </tbody>
    </table>

    <table class="table striped">
            <thead>
               <tr>
                  <th>Resource</th>
                  <th>Action</th>
                  <th>Resource.Action</th>
                  <th>Libera Acesso</th>
               </tr>
            </thead>
            <tbody>
 
          @if (count($abilities))
             @foreach ($abilities as $ability)
             <tr>
                <td>{{$ability->resource}}</td>
                <td>{{$ability->action}}</td>
                <td>{{$ability->resource_action}}</td>  
                <td>
                      <p>
                         <label>
                            <input type="radio" class="with-gap" disabled='disabled' name="{{$ability->resource_action}}" value="s" 
                            {{ $role->hasPermission($ability->resource_action) == true ? 'checked': ''}}>
                            <span>Sim</span>
                         </label>
                         <label>
                            <input  type="radio" class="with-gap" disabled='disabled' name="{{$ability->resource_action}}" value="n" 
                            {{ $role->hasPermission($ability->resource_action) == false ? 'checked': ''}}>
                            <span>Não</span>
                          </label>
                      </p>
                </td>  
             </tr>                
             @endforeach
          @else 
             <br>
             <div class="alert-main default">Cadastro de acessos vazio.</div>
          @endif        
 
        </tbody>
    </table> 

    @php /*Verifica se a ação é para excluir e apresenta botão de alteração.*/ @endphp
    @if($acao === "delete") 
        <div class="box-button-dab">
            <a class="waves-effect waves-light btn btn-delete" href="{{route('roles.destroy', ['role' => $role->id ]) }}"
                    onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"
                >
                Excluir
            </a>
            <a class="waves-effect waves-light btn btn-back" href="{{route('roles.index')}}"> voltar a lista</a>
        </div> 

    @else @php /* Apresenta botão de alteração */ @endphp
        
        <div class="box-button-dab">
            <a class="waves-effect waves-light btn btn-alter" href="{{route('roles.edit', ['role' => $role->id ]) }}">
                Alterar
            </a>
            <a class="waves-effect waves-light btn btn-back" href="{{route('roles.index')}}"> voltar a lista</a>
        </div>
    @endif   
    
@endsection