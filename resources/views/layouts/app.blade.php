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
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar {
            background-color: #1a3a5c !important;
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
        }
        .card-missa {
            border-left: 4px solid #1a3a5c;
        }
        .badge-dia {
            background-color: #1a3a5c;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-church"></i> Paróquia N. S. da Glória
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
    <main class="container mt-4">
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
</body>
</html>
