@extends('layouts.app')

@section('title', 'Eventos e Festas')

@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="mb-1"><i class="bi bi-calendar-event"></i> Eventos e Festas</h2>
        <p class="text-muted mb-4">Fique por dentro de tudo que acontece na nossa comunidade.</p>
    </div>
</div>

@if($eventos->isEmpty())
    <div class="alert alert-info">
        Nenhum evento cadastrado no momento.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($eventos as $evento)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-header" style="background-color: #1a3a5c; color: #fff;">
                        <strong>{{ $evento->titulo }}</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $evento->descricao }}</p>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="mb-2">
                            <span class="me-3">
                                <i class="bi bi-calendar3"></i>
                                {{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}
                            </span>
                            @if($evento->horario)
                                <span class="me-3">
                                    <i class="bi bi-clock"></i>
                                    {{ \Carbon\Carbon::parse($evento->horario)->format('H:i') }}
                                </span>
                            @endif
                            @if($evento->local)
                                <span>
                                    <i class="bi bi-geo-alt"></i>
                                    {{ $evento->local }}
                                </span>
                            @endif
                        </div>
                        {{-- US008 - Voluntariado --}}
                        @auth
                            @if(Auth::user()->eventosVoluntario->contains($evento->id))
                                <form action="{{ route('voluntario.cancelar', $evento->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-x-circle"></i> Cancelar voluntariado
                                    </button>
                                </form>
                                <span class="badge bg-success ms-1"><i class="bi bi-check"></i> Voluntário</span>
                            @else
                                <form action="{{ route('voluntario.inscrever', $evento->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="mensagem" value="">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-hand-thumbs-up"></i> Quero ser voluntário
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-person"></i> Login para ser voluntário
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
