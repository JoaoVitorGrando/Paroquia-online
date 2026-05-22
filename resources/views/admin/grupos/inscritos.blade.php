@extends('layouts.app')

@section('title', 'Inscritos no grupo')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0"><i class="bi bi-people-fill"></i> Inscritos — {{ $grupo->nome }}</h2>
    <a href="{{ route('admin.grupos') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<p class="text-muted mb-3">{{ $grupo->inscritos->count() }} pessoa(s) inscrita(s) neste grupo.</p>

@if($grupo->inscritos->isEmpty())
    <div class="alert alert-info">Ainda não há inscritos neste grupo.</div>
@else
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead style="background-color:#1a3a5c; color:#fff;">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Inscrito em</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupo->inscritos as $i => $u)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($u->pivot->created_at)->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
