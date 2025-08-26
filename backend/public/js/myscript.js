document.addEventListener('DOMContentLoaded', function () {

    // Código para o funcionamento do - e + da quant de dispositivos
    const incrementButtons = document.querySelectorAll('.increment');
    const decrementButtons = document.querySelectorAll('.decrement');

    incrementButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('input[type="number"]');
            input.value = parseInt(input.value) + 1;
        });
    });

    decrementButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const input = this.parentElement.querySelector('input[type="number"]');
            if (parseInt(input.value) > 0) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });

    // Codigo para abrir o modal com o plano ideal já com os dados
    let planoIdealData = {};
    const btnCalcular = document.getElementById('btn-calcular');
    if (btnCalcular) {
        btnCalcular.addEventListener('click', function (event) {
            event.preventDefault();

            // Transformar FormData em objeto JSON
            const data = {
                dispositivos: {
                    celular: parseInt(document.getElementById('celular').value) || 0,
                    computador: parseInt(document.getElementById('computador').value) || 0,
                    smart_tv: parseInt(document.getElementById('smart_tv').value) || 0,
                    tv_box: parseInt(document.getElementById('tv_box').value) || 0,
                    outros: parseInt(document.getElementById('outros').value) || 0
                },
                isGamer: document.getElementById('gamer').checked ? 1 : 0
            };

            planoIdealData.dispositivos = data.dispositivos;
            planoIdealData.isGamer = data.isGamer;

            fetch('http://localhost:3000/api/calcular_plano', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(resposta => {
                    //Variavel global
                    planoIdealData.plano = resposta.plano;
                    planoIdealData.velocidade = resposta.velocidade;
                    planoIdealData.pesoTotal = resposta.pesoTotal;
                    sessionStorage.setItem('contratarPlano', JSON.stringify(planoIdealData));

                    document.getElementById('nomePlano').innerText = resposta.plano;
                    document.getElementById('velocidade').innerText = resposta.velocidade + 'MB';

                    // Abrir modal
                    const modal = new bootstrap.Modal(document.getElementById('modalPlano'));
                    modal.show();
                })
                .catch(err => console.error(err))
        });
    }

    // Código para enviar os dados do plano para a api de contratacao
    const btnEnviar = document.getElementById('btn-enviar');
    if (btnEnviar) {
        btnEnviar.addEventListener('click', function (event) {
            event.preventDefault();

            const contratarPlanoString = sessionStorage.getItem('contratarPlano');

            if (contratarPlanoString) {
                const contratarPlano = JSON.parse(contratarPlanoString);

                planoIdealData = contratarPlano;
            }
            const data = {
                nome: document.getElementById('nome').value,
                telefone: document.getElementById('telefone').value,
                email: document.getElementById('email').value,
                is_gamer: planoIdealData.isGamer,
                plano: planoIdealData.plano,
                pesoTotal: planoIdealData.pesoTotal,
                dispositivos: planoIdealData.dispositivos
            };

            fetch('http://localhost:3000/api/contratar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(resposta => {

                    console.log(resposta)
                    const confirmacaoModal = bootstrap.Modal.getInstance(document.getElementById('confirmacaoModal'));
                    if (confirmacaoModal) {
                        confirmacaoModal.hide();

                        if (resposta.mensagem) {
                            const divSucesso = document.createElement('div');
                            divSucesso.className = "alert alert-success mt-3";
                            divSucesso.innerText = resposta.mensagem;
                            const form = document.getElementById('contatoForm')
                            form.prepend(divSucesso);

                            setTimeout(function () {
                                window.location.href = 'calculadora_plano';
                            }, 4000);
                        }
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Ocorreu um erro ao processar sua contratação. Tente novamente.");
                    console.error('Erro:', error.message);
                    alert('Erro: ' + error.message);
                });
        });
    }


});
