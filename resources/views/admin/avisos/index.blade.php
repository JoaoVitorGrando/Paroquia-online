@extends('layouts.app')

@section('title', 'Admin - Avisos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0"><i class="bi bi-megaphone"></i> Gerenciar Avisos</h2>
    <a href="{{ route('admin.avisos.criar') }}" class="btn text-white" style="background-color:#1a3a5c;">
        <i class="bi bi-plus-circle"></i> Novo Aviso
    </a>
</div>

@if($avisos->isEmpty())
    <div class="alert alert-info">Nenhum aviso cadastrado.</div>
@else
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead style="background-color:#1a3a5c; color:#fff;">
                <tr>
                    <th>Título</th>
                    <th>Destaque</th>
                    <th>Data</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($avisos as $aviso)
                    <tr>
                        <td>{{ $aviso->titulo }}</td>
                        <td>{{ $aviso->destaque ? 'Sim' : 'Não' }}</td>
                        <td>{{ $aviso->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.avisos.excluir', $aviso->id) }}" method="POST" class="d-inline"
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
