<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('tittle') - HDC Events</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- App CSS (Liquid Glass Theme) -->
        <link href="/css/styles.css" rel="stylesheet">

        <!-- App JS -->
        <script src="/js/script.js" defer></script>
    </head>
    <body>
        <!-- Ambient Liquid Background Blobs -->
        <div id="liquid-bg-container">
            <div class="liquid-blob blob-1"></div>
            <div class="liquid-blob blob-2"></div>
            <div class="liquid-blob blob-3"></div>
            <div class="liquid-overlay"></div>
        </div>

        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a href="/" class="navbar-brand">
                        <div class="brand-logo-wrap">
                            <img src="/img/hdcevents_logo.svg" alt="HDC Events">
                        </div>
                        <span>HDC Events</span>
                    </a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <ion-icon name="menu-outline" style="font-size: 1.5rem;"></ion-icon>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link">
                                    <ion-icon name="calendar-outline"></ion-icon> Eventos
                                </a>
                            </li>
                            <li class="nav-item nav-item-btn">
                                <a href="/events/create" class="nav-link">
                                    <ion-icon name="add-circle-outline"></ion-icon> Criar Evento
                                </a>
                            </li>
                            @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">
                                    <ion-icon name="grid-outline"></ion-icon> Meus Eventos
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST" class="d-inline">
                                    @csrf
                                    <a href="/logout" 
                                       class="nav-link" 
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                       <ion-icon name="log-out-outline"></ion-icon> Sair
                                    </a>
                                </form>
                            </li>
                            @endauth
                            @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">
                                    <ion-icon name="log-in-outline"></ion-icon> Entrar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">
                                    <ion-icon name="person-add-outline"></ion-icon> Cadastrar
                                </a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                @if(session('msg'))
                    <div class="msg">
                        <ion-icon name="checkmark-circle-outline" style="font-size: 1.2rem; vertical-align: middle; margin-right: 6px;"></ion-icon>
                        {{session('msg')}}
                    </div>
                @endif
                @yield('content')
            </div>
        </main>

        <footer>
            <p>
                <strong>HDC Events</strong> &copy; 2026 &bull; Todos os direitos reservados.
            </p>
        </footer>

        <!-- Ionicons Scripts -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- Bootstrap JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
