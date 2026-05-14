@extends('layouts.app')

@section('title', 'Avisos')

@section('content')
<h2 class="mb-1"><i class="bi bi-megaphone"></i> Avisos</h2>
<p class="text-muted mb-4">Fique por dentro dos comunicados da paróquia.</p>

@if($avisos->isEmpty())
    <div class="alert alert-info">Nenhum aviso publicado no momento.</div>
@else
    <div class="row row-cols-1 g-3">
        @foreach($avisos as $aviso)
            <div class="col">
                <div class="card shadow-sm {{ $aviso->destaque ? 'border-warning' : '' }}">
                    @if($aviso->destaque)
                        <div class="card-header bg-warning text-dark fw-bold">
                            <i class="bi bi-star-fill"></i> Destaque
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $aviso->titulo }}</h5>
                        <p class="card-text">{{ $aviso->conteudo }}</p>
                        <small class="text-muted">
                            <i class="bi bi-clock"></i> {{ $aviso->created_at->format('d/m/Y') }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
