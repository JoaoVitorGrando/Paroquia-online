@extends('layouts.app')

@section('title', 'Bem-vindo')

@section('content')
<div class="text-center mt-4">
    <h3>Bem-vindo(a), {{ Auth::user()->name }}!</h3>
    <p class="text-muted">Você está logado na Paróquia Online.</p>
    <a href="{{ route('missas.index') }}" class="btn me-2 text-white" style="background-color: #1a3a5c;">
        <i class="bi bi-clock"></i> Ver Horários de Missas
    </a>
    <a href="{{ route('eventos.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-calendar-event"></i> Ver Eventos
    </a>
</div>
@endsection
