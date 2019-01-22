      {{csrf_field()}}
      <div class="form-group">
         <label for="name">Nome</label>
         <input class="form-control" id="name" name="name" value="{{old('name',$patient->name)}}">
      </div>  

      @php
        $sex = $patient->sex;
      @endphp
      <div class="radio">
         <label>
            <input type="radio" name="sex" value="m" {{old('sex',$sex) == 'm'?'checked="checked"': ''}}> Masculino
         </label>
      </div>

       <div class="radio">
        <label>
            <input type="radio" name="sex" value="f" {{old('sex',$sex) == 'f'?'checked="checked"': ''}}> Feminino
        </label>
      </div>

      @php
         $period = $patient->period;    
      @endphp

      <div class="form-group">
         <label for="period">Período</label>
         <select class="form-control" name="period" id="period" value="{{$period}}">
             <option value="">Selecione o período para consulta</option>
             <option value="1" {{old('period',$period) == 1 ?'selected="selected"': ''}}>Diurno</option>
             <option value="2" {{old('period',$period) == 2 ?'selected="selected"': ''}}>Vespertino</option>
             <option value="3" {{old('period',$period) == 3 ?'selected="selected"': ''}}>Matutino</option>
             <option value="3" {{old('period',$period) == 3 ?'selected="selected"': ''}}>Noturno</option>      
             </option>
         </select>
      </div>      

      <div class="form-group">
         <label for="phone">Telefone </label>
         <input class="form-control" id="phone" name="phone" 
                value="{{old('phone',$patient->phone)}}">
      </div>

      <div class="form-group">
         <label for="documentRG">RG</label>
         <input class="form-control" id="documentRG" name="documentRG"
                value="{{old('documentRG',$patient->documentRG)}}">
      </div>

      <div class="form-group">
         <label for="documentCPF">CPF</label>
         <input class="form-control" id="documentCPF" name="documentCPF"
                value="{{old('documentCPF',$patient->documentCPF)}}">
      </div>

      <div class="form-group">
         <label for="documentCPF">SUS</label>
         <input class="form-control" id="documentSUS" name="documentSUS"
                value="{{old('documentSUS',$patient->documentSUS)}}">
      </div>

