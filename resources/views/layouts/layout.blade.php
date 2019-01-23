<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styleCustom.css"> 
</head>

    <body>

            <div class="container-fluid container-fluid-custom">   
                <nav class="navbar navbar-custom navbar-dark fixed-top bg-dark flex-md-nowrap shadow">
                    <a class="navbar-brand navbar-brand-custom col-sm-3 col-md-2 mr-0" href="http://localhost:8000/admin/institutions">Nome da empresa</a>
                    <ul class="navbar-nav px-3">
                        <li class="nav-item text-nowrap">
                        <a class="nav-link nav-link-custom" href="#">
                            <i class="material-icons centralizado sm">directions_run</i>
                            Sair
                        </a>
                        </li>
                    </ul>
                </nav>
                <br>
            </div>

            <div id="wrapper">
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li> <a href="http://localhost:8000/admin/institutions">
                                <i class="material-icons centralizado">location_city</i>
                                Instituições
                            </a>
                        </li>
                        <li> <a href="http://localhost:8000/admin/unities">
                                <i class="material-icons centralizado">place</i>
                                Unidades
                            </a>
                        </li>
                        <li> <a href="http://localhost:8000/institution/patients">
                                <i class="material-icons centralizado">airline_seat_recline_extra</i>
                                Pacientes
                            </a>
                        </li>    
                    </ul>
                </div>

                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#menu-toggle" id="menu-toggle"><i class="material-icons menu">swap_horiz</i></a>
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
