@extends('layouts.app')

@section('title', 'Admin Eventos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0"><i class="bi bi-calendar-event"></i> Gerenciar Eventos</h2>
    <a href="{{ route('admin.eventos.criar') }}" class="btn text-white" style="background-color:#1a3a5c;">
        <i class="bi bi-plus-circle"></i> Novo Evento
    </a>
</div>

@if($eventos->isEmpty())
    <div class="alert alert-info">Nenhum evento cadastrado.</div>
@else
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead style="background-color:#1a3a5c; color:#fff;">
                <tr>
                    <th>Título</th>
                    <th>Data</th>
                    <th>Local</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                    <tr>
                        <td>{{ $evento->titulo }}</td>
                        <td>{{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}</td>
                        <td>{{ $evento->local ?? 'Não informado' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.eventos.editar', $evento->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('admin.eventos.excluir', $evento->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Confirmar exclusão?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
