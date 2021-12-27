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
        <header>
            <nav class="navbar navbar-expand-lg navbar=light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/hdcevents_logo.svg" alt="HDC Events">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                        </li>
                    @guest <!-- Não autenticado -->
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                    @endguest
                    @auth <!-- Autenticado -->
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus Eventos</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <a href="/logout" class="nav-link" 
                                    onclick="event.preventDefault(); 
                                    this.closest('form').submit(); "
                                >
                                    Sair
                                </a>
                            </form>
                        </li>
                    @endauth
                    </ul>
                    
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('success'))
                        <p class="msg-success">{{session('success')}}</p>
                    @endif
                    
                    @yield('content')
                </div>
            </div>
        </main>


        <footer>
            <p>2021 &copy;<a style="color: rgb(255, 255, 255);" target="_blank" href="https://www.linkedin.com/in/vittorvk2/">Vitor Alexandre</a></p>
        </footer>
    </body>
    <script src="/js/scripts.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>
