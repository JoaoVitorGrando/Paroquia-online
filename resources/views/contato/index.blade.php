@extends('layouts.app')

@section('title', 'Contato')

@section('content')
<div class="admin-topbar d-flex flex-wrap align-items-center gap-3">
    <span class="topbar-icon"><i class="bi bi-envelope"></i></span>
    <div class="me-auto">
        <h2>Entre em contato</h2>
        <p class="topbar-sub">Fale com a secretaria paroquial</p>
    </div>
</div>

{{-- WhatsApp em destaque: canal principal pedido pela paróquia --}}
<div class="panel-card mb-4" style="background-color:#eafaf0; border-color:#bde7cc;">
    <div class="panel-body d-flex flex-wrap align-items-center gap-3">
        <i class="bi bi-whatsapp" style="font-size:2.6rem; color:#25d366;"></i>
        <div class="me-auto">
            <h5 class="mb-1" style="color:#0a3d1f;">Fale com a secretaria pelo WhatsApp</h5>
            <p class="mb-0 small text-muted">
                É o jeito mais rápido de tirar dúvidas sobre missas, inscrições, batizados e casamentos.
            </p>
        </div>
        <x-whatsapp-btn
            mensagem="Olá, vim pelo site da paróquia e gostaria de falar com a secretaria."
            rotulo="Abrir conversa"
            classe="btn btn-lg btn-whats" />
    </div>
</div>

{{-- Informações de atendimento --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="panel-card h-100">
            <div class="panel-body">
                <div class="d-flex align-items-center gap-2 mb-1" style="color:#1a3a5c;">
                    <i class="bi bi-telephone"></i> <strong>Telefone</strong>
                </div>
                <p class="mb-0 text-muted">{{ config('paroquia.telefone') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel-card h-100">
            <div class="panel-body">
                <div class="d-flex align-items-center gap-2 mb-1" style="color:#1a3a5c;">
                    <i class="bi bi-clock"></i> <strong>Atendimento</strong>
                </div>
                <p class="mb-0 text-muted">Segunda a sexta<br>09h às 12h e 14h às 17h</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel-card h-100">
            <div class="panel-body">
                <div class="d-flex align-items-center gap-2 mb-1" style="color:#1a3a5c;">
                    <i class="bi bi-geo-alt"></i> <strong>Endereço</strong>
                </div>
                <p class="mb-0 text-muted">Caixa Postal, 10<br>85200-000, Pitanga, Paraná</p>
            </div>
        </div>
    </div>
</div>

{{-- US015 - Formulário de e-mail (alternativa ao WhatsApp) --}}
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h5 class="mb-1" style="color:#1a3a5c;">Prefere escrever? Envie uma mensagem</h5>
        <p class="text-muted small mb-3">
            Sua mensagem chega por e-mail em <a href="mailto:{{ $emailDestino }}">{{ $emailDestino }}</a>.
        </p>

        <div class="panel-card">
            <div class="panel-body">

                @if(session('sucesso'))
                    <div class="alert alert-success">{{ session('sucesso') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contato.enviar') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                            value="{{ old('nome') }}" placeholder="Seu nome completo" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="seuemail@exemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Assunto</label>
                        <input type="text" name="assunto" class="form-control @error('assunto') is-invalid @enderror"
                            value="{{ old('assunto') }}" placeholder="Assunto da mensagem" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mensagem</label>
                        <textarea name="mensagem" class="form-control @error('mensagem') is-invalid @enderror"
                            rows="5" placeholder="Escreva sua mensagem..." required>{{ old('mensagem') }}</textarea>
                    </div>

                    <button type="submit" class="btn w-100 text-white" style="background-color: #1a3a5c;">
                        <i class="bi bi-send"></i> Enviar Mensagem
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
