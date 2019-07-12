<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crash Team Racing Nitro Fueled</title>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" integrity="sha256-h0cGsrExGgcZtSZ/fRz4AwV+Nn6Urh/3v3jFRQ0w9dQ=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{asset('js/class.js')}}"></script>
    
</head>
<body class="theme">

    @include('inc.navbar')
    <br>
    <section class="container theme">
    
    @yield('body')
    </section>
    <script>
        $(document).ready()
            {
                if(!localStorage.getItem('theme'))
                    localStorage.setItem("theme", "white");
                
                tema = localStorage.getItem('theme');
                if(tema == "white")
                {
                    $(".theme").removeClass("grey darken-4");
                    $(".theme").removeClass("white-text");
                    $(".theme").addClass("white");
                    $(".theme").addClass("black-text");
                }
                if(tema == "black")
                {
                    $(".theme").removeClass("white");
                    $(".theme").removeClass("black-text");
                    $(".theme").addClass("grey darken-4");
                    $(".theme").addClass("white-text");
                }
            }
        ;
    </script>
</body>
</html>

            