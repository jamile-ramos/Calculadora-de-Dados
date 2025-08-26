<x-mail::message>
# NOVA CONTRATAÇÃO DE PLANO: AÇÃO NECESSÁRIA

Uma nova contratação foi realizada e aguarda seu contato para finalização.

---

### 📝 Dados do Cliente

* **Nome**: {{ $venda->nome }}
* **Email**: {{ $venda->email }}
* **Telefone**: {{ $venda->telefone }}
@if($venda->is_gamer)
* **Uso para Game**: Sim
@endif

---

### 📦 Detalhes da Contratação

* **Plano Contratado**: {{ $venda->plano->nome }}
* **Peso Total do Plano**: {{ $venda->peso_total }}
* **Velocidade**: {{ $venda->plano->velocidade }}

---

### 📦 Pesos dos Dispositivos

* Celular: {{ $pesos['celular'] }}
* Computador: {{ $pesos['computador'] }}
* Smart TV: {{ $pesos['smart_tv'] }}
* TV Box: {{ $pesos['tv_box'] }}
* Outros: {{ $pesos['outros'] }}
 
---

### 📱Dispositivos Inclusos

@php
    $iconesDispositivos = [
        'celular' => '📱',
        'computador' => '💻',
        'smart_tv' => '📺',
        'tv_box' => '📺',
        'outros' => '📦'
    ];
@endphp

@foreach($detalhesDispositivos as $detalhe)
* {{ $iconesDispositivos[$detalhe->tipo_dispositivo] ?? '' }} **{{ ucfirst($detalhe->tipo_dispositivo) }}**: {{ $detalhe->quantidade }} unidade(s)
@endforeach

---

Atenciosamente,<br>
Equipe {{ config('app.name') }}
</x-mail::message>