@extends('layouts.app')

@section('title', 'Calculadora de Planos')

@section('content')

<form id="contatoForm" method="POST" class="contratar-form col-lg-8 mx-auto">
    @csrf
    <p class="texto-instrucao">Preencha seus dados para receber uma proposta personalizada.</p>

    <!-- Input Nome -->
    <div class="input-row mb-3">
        <span class="input-label">
            <i class="bi bi-person-fill me-1"></i>Nome Completo
        </span>
        <div class="input-group flex-grow-1">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
        </div>
    </div>

    <!-- Input Telefone -->
    <div class="input-row mb-3">
        <span class="input-label">
            <i class="bi bi-phone-fill me-1"></i>Telefone
        </span>
        <div class="input-group flex-grow-1">
            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required>
        </div>
    </div>

    <!-- Input E-mail -->
    <div class="input-row mb-4">
        <span class="input-label">
            <i class="bi bi-envelope-fill me-1"></i>E-mail
        </span>
        <div class="input-group flex-grow-1">
            <input type="email" class="form-control" id="email" name="email" placeholder="seu-email@exemplo.com" required>
        </div>
    </div>

    <!-- Botão de Enviar -->
    <button type="button" class="btn btn-calcular w-100" data-bs-toggle="modal" data-bs-target="#confirmacaoModal">
        <i class="bi bi-send-fill me-2"></i>Receber Proposta
    </button>
</form>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmacaoModal" tabindex="-1" aria-labelledby="confirmacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacaoModalLabel">Confirmação de Contratação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja enviar sua proposta de contratação?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Botão de Confirmação dentro do modal que submete o formulário -->
                <button type="button" class="btn btn-primary" id="btn-enviar">Confirmar</button>
            </div>
        </div>
    </div>
</div>


@endsection