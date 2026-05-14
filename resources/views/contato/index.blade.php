@extends('layouts.app')

@section('title', 'Contato')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <h2 class="mb-1"><i class="bi bi-envelope"></i> Entre em Contato</h2>
        <p class="text-muted mb-4">Envie uma mensagem para a paróquia.</p>

        <div class="card shadow-sm">
            <div class="card-body">

                @if(session('sucesso'))
                    <div class="alert alert-success">{{ session('sucesso') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contato.enviar') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                            value="{{ old('nome') }}" placeholder="Seu nome completo" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="seuemail@exemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Assunto</label>
                        <input type="text" name="assunto" class="form-control @error('assunto') is-invalid @enderror"
                            value="{{ old('assunto') }}" placeholder="Assunto da mensagem" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mensagem</label>
                        <textarea name="mensagem" class="form-control @error('mensagem') is-invalid @enderror"
                            rows="5" placeholder="Escreva sua mensagem..." required>{{ old('mensagem') }}</textarea>
                    </div>

                    <button type="submit" class="btn w-100 text-white" style="background-color: #1a3a5c;">
                        <i class="bi bi-send"></i> Enviar Mensagem
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
