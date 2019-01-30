<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/style.css"> 

</head>

    <body>

        <div class="container">            
            <div class="header">
                Teste
            </div>
        </div>

    <nav>
        <div class="nav-wrapper nav-wrapper-custom">
            <div class="container">
                <a href="#" class="brand-logo">Empresa</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="# ">
                            <i class="material-icons sm">directions_run</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
            
        <div class="container">
            
                <div class="row">
                        <div class="col s3">
                            <!-- Menu -->
                            @include('layouts.layoutMenu')
                            <!-- Menu -->
                        </div>
                        <div class="col s9 ">
                            <div class="main-custom">
                                <!-- Conteúdo -->
                                @yield('content')
                                <br><br><br>
                                <!-- Conteúdo -->
                            </div>
                        </div>
                </div>
                
        </div>

        @include('layouts.layoutAdminFooter')

    </body>
</html>
