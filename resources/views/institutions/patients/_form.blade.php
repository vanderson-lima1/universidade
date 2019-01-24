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
         $periods = $patient::PERIOD;
      @endphp

      <div class="form-group">
         <label for="period">Período</label>
         <select class="form-control" name="period" id="period" value="{{$patient->period}}">
            <option value="">Selecione o período para consulta</option>
            @foreach ($periods as $key => $value)
               <option value="{{$key}}" {{old('period',$patient->period) == $key ?"selected='selected'" : ""}}>{{$value}}</option>    
            @endforeach            
         </select>
      </div>      

      <div class="form-group">
         <label for="phone">Celular </label>
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

