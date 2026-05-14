@extends('layouts.app')

@section('title', 'Editar Evento')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <h2 class="mb-4"><i class="bi bi-pencil"></i> Editar Evento</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.eventos.atualizar', $evento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Título *</label>
                        <input type="text" name="titulo" class="form-control"
                            value="{{ old('titulo', $evento->titulo) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição *</label>
                        <textarea name="descricao" class="form-control" rows="4" required>{{ old('descricao', $evento->descricao) }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Data *</label>
                            <input type="date" name="data" class="form-control"
                                value="{{ old('data', $evento->data->format('Y-m-d')) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Horário</label>
                            <input type="time" name="horario" class="form-control"
                                value="{{ old('horario', $evento->horario ? \Carbon\Carbon::parse($evento->horario)->format('H:i') : '') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Local</label>
                        <input type="text" name="local" class="form-control"
                            value="{{ old('local', $evento->local) }}">
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn text-white" style="background-color:#1a3a5c;">
                            <i class="bi bi-check-circle"></i> Atualizar
                        </button>
                        <a href="{{ route('admin.eventos') }}" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
