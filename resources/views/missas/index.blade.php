@extends('layouts.app')

@section('title', 'Horários de Missas')

@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="mb-1"><i class="bi bi-clock-history"></i> Horários de Missas</h2>
        <p class="text-muted mb-4">Confira os horários das celebrações na Paróquia Nossa Senhora da Glória.</p>
    </div>
</div>

@if($missas->isEmpty())
    <div class="alert alert-info">
        Nenhum horário cadastrado no momento.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($missas as $missa)
            <div class="col">
                <div class="card card-missa h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge badge-dia text-white fs-6 px-3 py-2">
                                {{ $missa->dia_semana }}
                            </span>
                            <span class="fs-4 fw-bold text-dark">
                                <i class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($missa->horario)->format('H:i') }}
                            </span>
                        </div>
                        <p class="card-text mt-2 text-muted">
                            <i class="bi bi-geo-alt"></i> {{ $missa->local }}
                        </p>
                        @if($missa->observacao)
                            <small class="text-muted fst-italic">{{ $missa->observacao }}</small>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
