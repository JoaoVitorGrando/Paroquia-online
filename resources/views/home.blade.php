@extends('layouts.app')

@section('title', 'Início')

@section('content')

{{-- Banner --}}
<div class="p-4 mb-4 rounded-3 text-white" style="background-color: #1a3a5c;">
    <div class="container-fluid py-3">
        <h1 class="display-6 fw-bold"><i class="bi bi-church"></i> Paróquia Nossa Senhora da Glória</h1>
        <p class="fs-5">Igreja Católica Ucraniana — bem-vindo à nossa comunidade!</p>
        <a href="{{ route('sobre') }}" class="btn btn-outline-light me-2">
            <i class="bi bi-info-circle"></i> Conheça a Paróquia
        </a>
        <a href="{{ route('contato') }}" class="btn btn-outline-light">
            <i class="bi bi-envelope"></i> Entre em Contato
        </a>
    </div>
</div>

{{-- Aviso destaque --}}
@if($avisoDestaque)
<div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
    <i class="bi bi-megaphone-fill me-2 fs-5"></i>
    <div>
        <strong>{{ $avisoDestaque->titulo }}:</strong> {{ $avisoDestaque->conteudo }}
    </div>
</div>
@endif

<div class="row g-4">

    {{-- Próximos eventos --}}
    <div class="col-md-8">
        <div class="card shadow-sm h-100">
            <div class="card-header text-white" style="background-color: #1a3a5c;">
                <h5 class="mb-0"><i class="bi bi-calendar-event"></i> Próximos Eventos</h5>
            </div>
            <div class="card-body">
                @forelse($proximosEventos as $evento)
                    <div class="d-flex align-items-start mb-3">
                        <div class="text-center me-3 p-2 rounded" style="background-color: #eaf0fb; min-width: 56px;">
                            <div class="fw-bold" style="color:#1a3a5c; font-size:1.3rem;">
                                {{ \Carbon\Carbon::parse($evento->data)->format('d') }}
                            </div>
                            <small style="color:#1a3a5c;">
                                {{ \Carbon\Carbon::parse($evento->data)->format('M') }}
                            </small>
                        </div>
                        <div>
                            <strong>{{ $evento->titulo }}</strong>
                            <p class="mb-0 text-muted small">{{ $evento->descricao }}</p>
                        </div>
                    </div>
                    @if(!$loop->last)<hr class="my-2">@endif
                @empty
                    <p class="text-muted">Nenhum evento próximo.</p>
                @endforelse
                <a href="{{ route('eventos.index') }}" class="btn btn-sm btn-outline-secondary mt-2">
                    Ver todos os eventos
                </a>
            </div>
        </div>
    </div>

    {{-- Missas do domingo --}}
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-header text-white" style="background-color: #1a3a5c;">
                <h5 class="mb-0"><i class="bi bi-clock"></i> Missas — Domingo</h5>
            </div>
            <div class="card-body">
                @forelse($missasDomingo as $missa)
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><i class="bi bi-clock text-muted"></i> {{ \Carbon\Carbon::parse($missa->horario)->format('H:i') }}</span>
                        <small class="text-muted">{{ $missa->local }}</small>
                    </div>
                @empty
                    <p class="text-muted">Nenhum horário cadastrado.</p>
                @endforelse
                <a href="{{ route('missas.index') }}" class="btn btn-sm btn-outline-secondary mt-2">
                    Ver todos os horários
                </a>
            </div>
        </div>
    </div>

</div>

{{-- Acesso rápido --}}
<div class="row g-3 mt-2">
    <div class="col-6 col-md-3">
        <a href="{{ route('grupos.index') }}" class="text-decoration-none">
            <div class="card text-center shadow-sm h-100 py-3">
                <i class="bi bi-people fs-2" style="color:#1a3a5c;"></i>
                <p class="mt-2 mb-0 fw-semibold">Grupos</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="{{ route('avisos.index') }}" class="text-decoration-none">
            <div class="card text-center shadow-sm h-100 py-3">
                <i class="bi bi-megaphone fs-2" style="color:#1a3a5c;"></i>
                <p class="mt-2 mb-0 fw-semibold">Avisos</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="{{ route('sobre') }}" class="text-decoration-none">
            <div class="card text-center shadow-sm h-100 py-3">
                <i class="bi bi-info-circle fs-2" style="color:#1a3a5c;"></i>
                <p class="mt-2 mb-0 fw-semibold">Sobre</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="{{ route('contato') }}" class="text-decoration-none">
            <div class="card text-center shadow-sm h-100 py-3">
                <i class="bi bi-envelope fs-2" style="color:#1a3a5c;"></i>
                <p class="mt-2 mb-0 fw-semibold">Contato</p>
            </div>
        </a>
    </div>
</div>

@endsection
