        {{csrf_field()}}
        <div class="form-group">
           <label for="name">Nome para o perfil</label>
           <input class="form-control" id="name" name="name" value="{{old('name',$role->name)}}">
        </div>  


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
                           <input type="radio" class="with-gap" name="{{$ability->resource_action}}" value="{{old("$ability->resource_action", 's')}}" {{ $role->hasPermission($ability->resource_action) == true ? 'checked': ''}}>
                           <span>Sim</span>
                        </label>
                        <label>
                           <input type="radio" class="with-gap" name="{{$ability->resource_action}}" value="{{old("$ability->resource_action", 'n')}}" {{ $role->hasPermission($ability->resource_action) == false ? 'checked': ''}}>
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