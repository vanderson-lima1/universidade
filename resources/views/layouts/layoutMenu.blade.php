<div class="menu-custom-background z-depth-3">
    <div class="menu-custom">
        <ul>

            <?php 
            
                // Obtém a URI da página, em seguida a transforma num array, separando "diretórios" por barra.
                // Exemplo: http://localhost:8000/admin/institutions
                // $url_server[0] = null
                // $url_server[1] = admin *** (Deve ser obrigatoriamente 'admin').
                // $url_server[2] = institutions
                // $url_server[3] = null (erro enquanto não executar nenhuma função - como 'edit').
                $url_server = $_SERVER['REQUEST_URI'];
                $url_server = explode('/', $url_server);

                if(empty($url_server[2]) && $url_server[1] === 'admin'){
                    $url_server = $url_server[1]; 
                }else {
                    $url_server = $url_server[2];
                }

            ?>
           
            <li class="{{ $url_server == 'admin' ? 'menu-custom-active' : '' }}">                                 
                <a class="{{ $url_server == 'admin' ? 'a-link-active' : '' }}" href="{{route('index')}}">
                    <i class="material-icons centralizado">person</i>
                    Início
                </a>
            </li>
            <li class="{{ $url_server == 'institutions' ? 'menu-custom-active' : '' }}">
                <a class="{{ $url_server == 'institutions' ? 'a-link-active' : '' }}" href="{{route('institutions.index')}}">
                    <i class="material-icons centralizado">location_city</i>
                    Instituições
                </a>
            </li>
            <li class="{{ $url_server == 'unities' ? 'menu-custom-active' : '' }}">
                <a class="{{ $url_server == 'unities' ? 'a-link-active' : '' }}" href="{{route('unities.index')}}">
                    <i class="material-icons centralizado">place</i>
                    Unidades
                </a>
            </li>
            <li class="{{ $url_server == 'patients' ? 'menu-custom-active' : '' }}">
                <a class="{{ $url_server == 'patients' ? 'a-link-active' : '' }}" href="{{route('patients.index')}}">
                    <i class="material-icons centralizado">airline_seat_recline_extra</i>
                    Pacientes
                </a>
            </li>    
            <li class="{{ $url_server == 'courses' ? 'menu-custom-active' : '' }}"> 
                <a class="{{ $url_server == 'courses' ? 'a-link-active' : '' }}" href="{{route('courses.index')}}">
                    <i class="material-icons centralizado">book</i>
                    Cursos
                </a>
            </li>    
            <li class="{{ $url_server == 'subjects' ? 'menu-custom-active' : '' }}"> 
                <a class="{{ $url_server == 'subjects' ? 'a-link-active' : '' }}" href="{{route('subjects.index')}}">
                    <i class="material-icons centralizado">library_books</i>
                    Matéria
                </a>
            </li>
            <li class="{{ $url_server == 'teachers' ? 'menu-custom-active' : '' }}"> 
                <a class="{{ $url_server == 'teachers' ? 'a-link-active' : '' }}" href="{{route('teachers.index')}}">
                    <i class="material-icons centralizado">library_books</i>
                    Professor
                </a>
            </li>
            <li class="{{ $url_server == 'students' ? 'menu-custom-active' : '' }}"> 
                <a class="{{ $url_server == 'students' ? 'a-link-active' : '' }}" href="{{route('students.index')}}">
                    <i class="material-icons centralizado">library_books</i>
                    Aluno
                </a>
            </li>
            <li class="{{ $url_server == 'employees' ? 'menu-custom-active' : '' }}"> 
                <a class="{{ $url_server == 'employees' ? 'a-link-active' : '' }}" href="{{route('employees.index')}}">
                    <i class="material-icons centralizado">assignment_ind</i>
                    Funcionário
                </a>
            </li>
        </ul>
    </div>
</div>
