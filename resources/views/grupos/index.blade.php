@extends('layouts.app')

@section('title', 'Grupos da Paróquia')

@section('content')
<h2 class="mb-1"><i class="bi bi-people"></i> Grupos da Paróquia</h2>
<p class="text-muted mb-4">Conheça e participe das atividades da nossa comunidade.</p>

@if($grupos->isEmpty())
    <div class="alert alert-info">Nenhum grupo cadastrado no momento.</div>
@else
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($grupos as $grupo)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-header text-white" style="background-color: #1a3a5c;">
                        <strong><i class="bi bi-people-fill"></i> {{ $grupo->nome }}</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $grupo->descricao }}</p>

                        @if($grupo->responsavel)
                            <p class="mb-1 small text-muted">
                                <i class="bi bi-person"></i> Responsável: {{ $grupo->responsavel }}
                            </p>
                        @endif
                        @if($grupo->dia_reuniao && $grupo->horario_reuniao)
                            <p class="mb-1 small text-muted">
                                <i class="bi bi-calendar3"></i> {{ $grupo->dia_reuniao }}
                                às {{ \Carbon\Carbon::parse($grupo->horario_reuniao)->format('H:i') }}
                            </p>
                        @endif
                        @if($grupo->local)
                            <p class="mb-2 small text-muted">
                                <i class="bi bi-geo-alt"></i> {{ $grupo->local }}
                            </p>
                        @endif
                    </div>
                    <div class="card-footer bg-light">
                        @auth
                            @if(in_array($grupo->id, $gruposInscritos))
                                <form action="{{ route('grupos.cancelar', $grupo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-x-circle"></i> Cancelar inscrição
                                    </button>
                                </form>
                                <span class="badge bg-success ms-2"><i class="bi bi-check"></i> Inscrito</span>
                            @else
                                <form action="{{ route('grupos.inscrever', $grupo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm text-white" style="background-color:#1a3a5c;">
                                        <i class="bi bi-person-plus"></i> Participar
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-person"></i> Faça login para se inscrever
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
