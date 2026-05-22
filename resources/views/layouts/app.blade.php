<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Paróquia Nossa Senhora da Glória')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1 0 auto;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-weight: bold;
            margin-right: 1rem;
            padding-top: 0.35rem;
            padding-bottom: 0.35rem;
        }
        .navbar-brand-logo-wrap {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            position: relative;
            border: 2px solid #f0d080;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
            background-color: #f4efe4;
        }
        .navbar-brand-logo {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 132%;
            height: 132%;
            max-width: none;
            transform: translate(-50%, -50%);
            object-fit: contain;
        }
        .navbar-brand-text {
            line-height: 1.15;
            font-size: 0.95rem;
        }
        @media (max-width: 575.98px) {
            .navbar-brand-logo-wrap {
                width: 44px;
                height: 44px;
            }
            .navbar-brand-text {
                font-size: 0.85rem;
            }
        }
        .navbar {
            background-color: #1a3a5c !important;
        }
        .navbar .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }
        .navbar .navbar-toggler-icon {
            filter: invert(1);
        }
        .navbar a {
            color: #fff !important;
        }
        .navbar a:hover {
            color: #f0d080 !important;
        }
        .footer {
            background-color: #1a3a5c;
            color: #ccc;
            padding: 20px 0;
            margin-top: 40px;
            flex-shrink: 0;
        }
        .card-missa {
            border-left: 4px solid #1a3a5c;
        }
        .badge-dia {
            background-color: #1a3a5c;
        }
        /* Hero da home — carrossel de imagens */
        .hero-igreja {
            position: relative;
            width: 100%;
            height: clamp(480px, 56.25vw, 85vh);
            min-height: 480px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 30px;
            overflow: hidden;
        }
        .hero-igreja-slides {
            position: absolute;
            inset: 0;
            z-index: 0;
        }
        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .hero-slide.active {
            opacity: 1;
        }
        .hero-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(rgba(26,58,92,0.55), rgba(26,58,92,0.65));
        }
        .hero-igreja .container {
            position: relative;
            z-index: 1;
        }
        .hero-igreja h1 {
            font-weight: 700;
            font-size: 2.6rem;
            text-shadow: 0 2px 12px rgba(0,0,0,0.45);
        }
        .hero-igreja p.lead {
            font-size: 1.2rem;
            text-shadow: 0 1px 8px rgba(0,0,0,0.45);
        }
        .hero-igreja .btn-hero {
            background-color: #f0d080;
            color: #1a3a5c;
            font-weight: 600;
            border: none;
        }
        .hero-igreja .btn-hero:hover {
            background-color: #e6c267;
            color: #1a3a5c;
        }
        /* Carrossel da página Sobre — imagens inteiras (sem corte) */
        #carrosselSobre {
            background-color: #1a3a5c;
        }
        .carousel-img {
            width: 100%;
            height: auto;
            max-height: 600px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            background-color: #1a3a5c;
        }
        .carousel-caption {
            background: rgba(26, 58, 92, 0.75);
            border-radius: 8px;
            padding: 10px 18px;
            bottom: 1.5rem;
        }
        .carousel-caption h5 {
            font-weight: 700;
            margin-bottom: 4px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid px-3 px-lg-4">
            <a class="navbar-brand me-3" href="{{ route('home') }}" title="Paróquia Nossa Senhora da Glória">
                <span class="navbar-brand-logo-wrap">
                    <img src="{{ asset('images/logoigreja.png') }}" alt="" class="navbar-brand-logo" aria-hidden="true">
                </span>
                <span class="navbar-brand-text">Paróquia N. S. da Glória</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="bi bi-house"></i> Início
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('missas.index') }}">
                            <i class="bi bi-clock"></i> Missas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('eventos.index') }}">
                            <i class="bi bi-calendar-event"></i> Eventos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('grupos.index') }}">
                            <i class="bi bi-people"></i> Grupos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('avisos.index') }}">
                            <i class="bi bi-megaphone"></i> Avisos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sobre') }}">
                            <i class="bi bi-info-circle"></i> Sobre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contato') }}">
                            <i class="bi bi-envelope"></i> Contato
                        </a>
                    </li>

                    @auth
                        @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">
                                <i class="bi bi-gear"></i> Admin
                            </a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right"></i> Sair
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-person"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cadastro.form') }}">
                                <i class="bi bi-person-plus"></i> Cadastrar
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <main>
        @yield('hero')

        <div class="container mt-4">
            @if(session('sucesso'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('sucesso') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('erro'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('erro') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p class="mb-0">Paróquia Nossa Senhora da Glória, Igreja Católica Ucraniana</p>
            <small>Sistema desenvolvido por alunos do curso de Engenharia de Software</small>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
