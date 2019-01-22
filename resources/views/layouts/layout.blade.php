@extends('layouts.layoutAdminHead')

    <body>

            <div class="container-fluid container-fluid-custom">   
                <nav class="navbar navbar-custom navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
                    <a class="navbar-brand navbar-brand-custom col-sm-3 col-md-2 mr-0" href="#">Nome da empresa</a>
                    <ul class="navbar-nav px-3">
                        <li class="nav-item text-nowrap">
                        <a class="nav-link nav-link-custom" href="#">Sair</a>
                        </li>
                    </ul>
                </nav>
                <br>
            </div>

            <div id="wrapper">
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li> <a href="http://localhost:8000/admin/institutions">Instituições</a></li>
                        <li> <a href="http://localhost:8000/admin/unities">Unidades</a></li>
                        <li> <a href="http://localhost:8000/institution/patients">Pacientes</a></li>    
                    </ul>
                </div>

                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#menu-toggle" class="badge badge-info" id="menu-toggle">Menu</a>
                                <hr>

                                <!-- Conteúdo -->
                                @yield('content')
                                <!-- Conteúdo -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @extends('layouts.layoutAdminFooter') 

    </body>
</html>
