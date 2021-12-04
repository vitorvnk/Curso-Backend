<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- CSS Projeto -->
        <link rel="stylesheet" href="/css/style.css">
        
        <title>@yield('title')</title>
    </head>
    <body>
        @yield('content')
        <footer>
            <br><br><hr>
            <p style="text-align:center;">2021 &copy;<a style="color: rgb(0, 0, 0);" target="_blank" href="https://www.linkedin.com/in/vittorvk2/">Vitor Alexandre</a></p>
        </footer>
    </body>
    <script src="/js/scripts.js"></script>
</html>
