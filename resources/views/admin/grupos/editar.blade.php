@extends('layouts.app')

@section('title', 'Editar Grupo')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0"><i class="bi bi-pencil-square"></i> Editar Grupo</h2>
    <a href="{{ route('admin.grupos') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.grupos.atualizar', $grupo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nome do grupo *</label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                       value="{{ old('nome', $grupo->nome) }}" required>
                @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição *</label>
                <textarea name="descricao" rows="3" class="form-control @error('descricao') is-invalid @enderror"
                          required>{{ old('descricao', $grupo->descricao) }}</textarea>
                @error('descricao')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Responsável</label>
                    <input type="text" name="responsavel" class="form-control"
                           value="{{ old('responsavel', $grupo->responsavel) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Local</label>
                    <input type="text" name="local" class="form-control" value="{{ old('local', $grupo->local) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Dia da reunião</label>
                    <select name="dia_reuniao" class="form-select">
                        <option value="">Selecione...</option>
                        @foreach(['Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado','Domingo'] as $d)
                            <option value="{{ $d }}" {{ old('dia_reuniao', $grupo->dia_reuniao) === $d ? 'selected' : '' }}>{{ $d }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Horário</label>
                    <input type="time" name="horario_reuniao" class="form-control"
                           value="{{ old('horario_reuniao', $grupo->horario_reuniao ? \Carbon\Carbon::parse($grupo->horario_reuniao)->format('H:i') : '') }}">
                </div>
            </div>

            <button type="submit" class="btn text-white" style="background-color:#1a3a5c;">
                <i class="bi bi-save"></i> Salvar alterações
            </button>
        </form>
    </div>
</div>
@endsection
