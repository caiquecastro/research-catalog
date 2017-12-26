<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Catalogo de Pesquisadores | Unitau</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            @include('layouts/navbar')
            <div class="container">
                @yield('content')
                <hr>
                <footer>
                    <p>© 2014 - {{ date('Y') }} - Desenvolvido por alunos do Departamento de Informática da UNITAU</p>
                </footer>
            </div>
        </div>
        <script src="/js/app.js"></script>
        <script src="/js/vendor/jquery.tokeninput.js"></script>
        <script src="/js/vendor/main.js"></script>
    </body>
</html>
