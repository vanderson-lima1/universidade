      {{csrf_field()}}
      <div class="form-group">
         <label for="name">Nome</label>
         <input class="form-control" id="name" name="name" value="{{old('name',$subject->name)}}">
      </div>  

      <div class="form-group">
         <label for="course">Cursos</label>
         <select class="form-control" id="course" name="course_id">
            <option value="">Selecionar curso para disciplina</option>
            @foreach ($courses as $course)
               <option value="{{$course->id}}" {{old('course_id',$subject->course_id) == $course->id ? "selected = 'select'" : ""}}>{{$course->name}}</option>
            @endforeach
         </select>
      </div>
