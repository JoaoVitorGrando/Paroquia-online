@extends('layouts.app')

@section('title', 'Painel Admin')

@section('content')
<h2 class="mb-1"><i class="bi bi-gear"></i> Painel Administrativo</h2>
<p class="text-muted mb-4">Gerencie os conteúdos do site.</p>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color:#1a3a5c;">
                <strong><i class="bi bi-calendar-event"></i> Eventos</strong>
            </div>
            <div class="card-body">
                <p class="fs-4 fw-bold">{{ $totalEventos }} eventos cadastrados</p>
                <a href="{{ route('admin.eventos') }}" class="btn text-white me-2" style="background-color:#1a3a5c;">
                    Gerenciar Eventos
                </a>
                <a href="{{ route('admin.eventos.criar') }}" class="btn btn-outline-secondary">
                    + Novo Evento
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color:#1a3a5c;">
                <strong><i class="bi bi-megaphone"></i> Avisos</strong>
            </div>
            <div class="card-body">
                <p class="fs-4 fw-bold">{{ $totalAvisos }} avisos publicados</p>
                <a href="{{ route('admin.avisos') }}" class="btn text-white me-2" style="background-color:#1a3a5c;">
                    Gerenciar Avisos
                </a>
                <a href="{{ route('admin.avisos.criar') }}" class="btn btn-outline-secondary">
                    + Novo Aviso
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
