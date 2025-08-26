<x-mail::message>
# Olá, {{ $venda->nome }}!

Obrigado por contratar nosso plano! Estamos empolgados em ter você conosco.

---

### 📝 Resumo da sua Contratação

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

### 📱 Dispositivos Inclusos

@php
    $iconesDispositivos = [
        'celular' => '📱',
        'computador' => '💻',
        'smart_tv' => '�',
        'tv_box' => '📺',
        'outros' => '📦'
    ];
@endphp

@foreach($detalhesDispositivos as $detalhe)
* {{ $iconesDispositivos[$detalhe->tipo_dispositivo] ?? '' }} **{{ ucfirst($detalhe->tipo_dispositivo) }}**: {{ $detalhe->quantidade }} unidade(s)
@endforeach

---

Em breve entraremos em contato para finalizar a instalação. Qualquer dúvida, por favor, não hesite em nos contatar.

Atenciosamente,<br>
Equipe {{ config('app.name') }}
</x-mail::message>