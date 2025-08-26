@extends('layouts.app')

@section('title', 'Calculadora de Planos')

@section('content')
<div class="container py-4">
    <form id="calculoPlanos" method="POST" action="/api/calcular" class="calculadora-form">
        @csrf
        <p class="texto-instrucao">Selecione a quantidade de cada dispositivo e descubra o plano ideal para você!</p>

        <!-- Inputs -->
        <div class="input-row mb-3">
            <span class="input-label celular">
                <i class="bi bi-phone-fill me-1"></i>Celulares
            </span>
            <div class="input-group flex-grow-1">
                <button type="button" class="btn btn-outline-primary decrement">-</button>
                <input type="number" class="form-control text-center" id="celular" name="dispositivos[celular]" value="0" min="0" readonly>
                <button type="button" class="btn btn-outline-primary increment">+</button>
            </div>
        </div>

        <div class="input-row mb-3">
            <span class="input-label computador">
                <i class="bi bi-laptop-fill me-1"></i>Computadores
            </span>
            <div class="input-group flex-grow-1">
                <button type="button" class="btn btn-outline-primary decrement">-</button>
                <input type="number" class="form-control text-center" id="computador" name="dispositivos[computador]" value="0" min="0" readonly>
                <button type="button" class="btn btn-outline-primary increment">+</button>
            </div>
        </div>

        <div class="input-row mb-3">
            <span class="input-label smart_tv">
                <i class="bi bi-tv-fill me-1"></i>Smart TVs
            </span>
            <div class="input-group flex-grow-1">
                <button type="button" class="btn btn-outline-primary decrement">-</button>
                <input type="number" class="form-control text-center" id="smart_tv" name="dispositivos[smart_tv]" value="0" min="0" readonly>
                <button type="button" class="btn btn-outline-primary increment">+</button>
            </div>
        </div>

        <div class="input-row mb-3">
            <span class="input-label tv_box">
                <i class="bi bi-box-fill me-1"></i>TV Box
            </span>
            <div class="input-group flex-grow-1">
                <button type="button" class="btn btn-outline-primary decrement">-</button>
                <input type="number" class="form-control text-center" id="tv_box" name="dispositivos[tv_box]" value="0" min="0" readonly>
                <button type="button" class="btn btn-outline-primary increment">+</button>
            </div>
        </div>

        <div class="input-row mb-4">
            <span class="input-label outros">
                <i class="bi bi-hdd-network-fill me-1"></i>Outros
            </span>
            <div class="input-group flex-grow-1">
                <button type="button" class="btn btn-outline-primary decrement">-</button>
                <input type="number" class="form-control text-center" id="outros" name="dispositivos[outros]" value="0" min="0" readonly>
                <button type="button" class="btn btn-outline-primary increment">+</button>
            </div>
        </div>

        <!-- Gamer -->
        <div class="form-check mb-3 d-flex justify-content-center">
            <input class="form-check-input me-2" type="checkbox" value="1" id="gamer" name="isGamer">
            <label class="form-check-label gamer" for="gamer">Uso internet para Game</label>
        </div>

        <button type="submit" class="btn btn-calcular" id="btn-calcular">
            <i class="bi bi-calculator me-2"></i>Calcular Plano
        </button>
    </form>
</div>
@endsection

<!-- Modal Plano Ideal -->
<div class="modal fade" id="modalPlano" tabindex="-1" aria-labelledby="modalPlanoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center shadow-lg border-0 rounded-4">
            <div class="modal-header bg-primary text-white border-0 rounded-top-4 p-4">
                <h5 class="modal-title fs-4 fw-bold w-100" id="modalPlanoLabel">Seu Plano Ideal</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body p-5">
                <p class="fs-6 text-muted mb-2">Com base no seu perfil, o plano ideal para você é:</p>
                <h3 id="nomePlano" class="mb-3 display-4 fw-bolder text-primary">Plano Ouro</h3>
                <p class="fs-5 text-muted mb-0"><i class="bi bi-speedometer2 me-2"></i>Velocidade: <span id="velocidade" class="fw-semibold">100Mbps</span></p>
                <p class="fs-4 fw-bold text-success mt-4" id="valorPlano">R$ 199,99 / mês</p>
            </div>
            <div class="modal-footer justify-content-center border-0 pt-0 pb-4">
                <a href="/contratar" class="btn btn-primary btn-lg fw-bold rounded-pill shadow-sm">Contratar Plano</a>
                <button type="button" class="btn btn-link text-secondary fw-bold" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

