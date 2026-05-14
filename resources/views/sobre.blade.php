@extends('layouts.app')

@section('title', 'Sobre a Paróquia')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h2 class="mb-1"><i class="bi bi-info-circle"></i> Sobre a Paróquia</h2>
        <p class="text-muted mb-4">Conheça a nossa história e missão.</p>

        <div class="card shadow-sm mb-4">
            <div class="card-header text-white" style="background-color: #1a3a5c;">
                <strong>Paróquia Nossa Senhora da Glória — Igreja Católica Ucraniana</strong>
            </div>
            <div class="card-body">
                <p>A Paróquia Nossa Senhora da Glória é uma comunidade da Igreja Católica Ucraniana que atua na promoção de atividades religiosas, culturais e comunitárias, atendendo fiéis da região.</p>
                <p>Fundada por imigrantes ucranianos e seus descendentes, a paróquia mantém viva a tradição religiosa e cultural ucraniana, sendo um espaço de fé, acolhimento e integração para toda a comunidade.</p>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header text-white" style="background-color: #1a3a5c;">
                <strong><i class="bi bi-heart"></i> Nossa Missão</strong>
            </div>
            <div class="card-body">
                <p>Evangelizar e acolher todos os fiéis, promovendo a fé católica de rito bizantino ucraniano, fortalecendo a identidade cultural e a integração da comunidade por meio das atividades religiosas e sociais.</p>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header text-white" style="background-color: #1a3a5c;">
                <strong><i class="bi bi-people"></i> Atividades e Grupos</strong>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Celebrações religiosas semanais</li>
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Catequese para crianças e jovens</li>
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Grupo de Jovens</li>
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Grupo de Dança Ucraniana</li>
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Apostolado da Oração</li>
                    <li class="list-group-item"><i class="bi bi-check-circle text-success me-2"></i> Festa da Colheita (evento anual tradicional)</li>
                </ul>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('contato') }}" class="btn text-white me-2" style="background-color:#1a3a5c;">
                <i class="bi bi-envelope"></i> Entre em Contato
            </a>
            <a href="{{ route('grupos.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-people"></i> Ver Grupos
            </a>
        </div>
    </div>
</div>
@endsection
