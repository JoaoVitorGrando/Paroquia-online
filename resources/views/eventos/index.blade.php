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
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
