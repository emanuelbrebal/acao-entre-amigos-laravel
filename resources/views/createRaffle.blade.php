@extends('layouts.loginLayout')
@section('title', 'Cadastrar nova Rifa')
@section('content')

    <section class="cadastro-main">
        <div class="informacoes-cadastro">
            <h1 class="form-title">Criar Rifa</h1>
            <h5>Insira os dados de como deseja a sua rifa. Os dados poderão ser editados depois.</h5>
        </div>
        <form class="cadastro-form" action="{{ route('cadastrarRifa') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="campo-formulario">
                <label for="id_instituicao">Instituição responsável.</label>
                <input class="form-input" type="text" value="{{ $instituicao_nome }}" disabled>
                <input class="form-input" type="hidden" name="id_instituicao" value="{{ $instituicao_id }}">
            </div>

            <div class="campo-formulario">
                <label for="titulo">Título</label>
                <input class="form-input" type="text" placeholder="Digite o título da sua rifa" name="titulo_rifa"
                    required>
            </div>

            <div class="organiza-valor">
                <div class="campo-formulario numeros-options">
                    <label for="qtd_numeros">Quantidade de cotas</label>
                    <input class="form-input" type="number" min="1" max="1000000" name="qtd_num" id="qtd_numeros"
                        value="1">
                </div>

                <div class="campo-formulario">
                    <label for="preco_numeros">Valor de cada cota</label>
                    <input class="form-input" type="number" min="1" step="0.5" max="1000000"
                        name="preco_numeros" id="preco_numeros" value="1">

                </div>
                <div class="valor_total">
                    <p>Total Arrecadado: </p>
                    <p class="form-input valor-total-arrecadado" id="valor-total-arrecadado"></p>
                </div>
            </div>

            <div class="campo-formulario">
                <label for="premiacao">Premiação</label>
                <input class="form-input" type="text" placeholder="Qual será a premiação do sorteio?" name="premiacao"
                    required>
            </div>

            <div class="campo-formulario">
                <label for="data_sorteio">Data do sorteio</label>
                <input class="form-input" type="date" placeholder="Selecione a data do sorteio" name="data_sorteio"
                    required>
            </div>

            <div class="campo-formulario">
                <label for="imagem">Imagem</label>
                <input class="form-input" type="file" placeholder="Selecione uma imagem" name="imagem">
            </div>

            <button class="btn btn-submit" type="submit">Criar rifa</button>
        </form>
    </section>

    <script>
        const pValorArrecadado = document.getElementById('valor-total-arrecadado');
        const qtdCotas = document.getElementById('qtd_numeros');
        const precoNumeros = document.getElementById('preco_numeros');

        function calcularTotal() {
            const quantidade = parseInt(qtdCotas.value, 10);
            const preco = parseFloat(precoNumeros.value);


            if (!isNaN(quantidade) && !isNaN(preco)) {
                const valorTotal = quantidade * preco;
                pValorArrecadado.innerText = `R$ ${valorTotal.toFixed(2).replace('.', ',')}`; // Atualiza o valor total
            }
        }

        // function ajustarQuantidade() {
        //     let valor = this.value;

        //     // Caso o valor não seja um número ou seja menor que 1, corrige para 1
        //     if (isNaN(valor) || valor < 1) {
        //         valor = 1;
        //     } else {
        //         // Ajusta o valor para múltiplos de 5
        //         valor = Math.max(1, Math.round((valor - 1) / 5) * 5 + 1);
        //     }

        //     // Atualiza o campo de input com o valor ajustado
        //     this.value = valor;

        //     // Recalcula o total
        //     calcularTotal();
        // }

        // Adiciona event listeners
        qtdCotas.addEventListener("input", calcularTotal);
        precoNumeros.addEventListener("input", calcularTotal);

        // Chama a função inicialmente para calcular o total
        calcularTotal();
    </script>
@endsection
