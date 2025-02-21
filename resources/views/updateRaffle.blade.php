@extends('layouts.form')
@section('title', 'Editar Rifa')
@section('content')

    <section class="cadastro-main">
        <a href="{{ route('redirecionarHome') }}" class="btn -voltar"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                height="20" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M21 12h-17.5" />
                    <path d="M3 12l7 7M3 12l7 -7" />
                </g>
            </svg>
            voltar</a>
        <div class="informacoes-cadastro">
            <h1 class="form-title">Editar Rifa</h1>
            <h5>Insira os dados de como deseja a sua rifa. Os dados poderão ser editados depois.</h5>
        </div>
        <form class="cadastro-form" method="GET" action="{{ route('editarRifa') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="campo-formulario">
                <label for="id_instituicao">Instituição responsável.</label>
                <input class="form-input" type="text" value="{{ Auth::guard('instituicao')->user()->nome }}" disabled>
                <input class="form-input" type="hidden" name="id_rifa"
                    value="{{ $rifa->id }}">
                <input class="form-input" type="hidden" name="id_instituicao"
                    value="{{ Auth::guard('instituicao')->user()->id }}">
            </div>

            <div class="campo-formulario">
                <label for="titulo">Título</label>
                <input class="form-input" type="text" placeholder="{{ $rifa->titulo_rifa }}" name="titulo_rifa">
            </div>

            <div class="organiza-valor">
                <div class="campo-formulario numeros-options">
                    <label for="qtd_numeros">Quantidade de cotas</label>
                    <input class="form-input" type="number" min="10" max="1000000" step="10" name="qtd_num"
                        id="qtd_numeros" value="{{ $rifa->qtd_num }}" disabled>
                </div>

                <div class="campo-formulario">
                    <label for="preco_numeros">Valor de cada cota</label>
                    <input class="form-input" type="number" min="1" step="0.5" max="1000000"
                        name="preco_numeros" id="preco_numeros" value="{{ $rifa->preco_numeros }}">

                </div>
                <div class="valor_total">
                    <p>Total Arrecadado: </p>
                    <p class="form-input valor-total-arrecadado" id="valor-total-arrecadado"></p>
                </div>
            </div>

            <div class="campo-formulario">
                <label for="premiacao">Premiação</label>
                <input class="form-input" type="text" placeholder="{{ $rifa->premiacao }}" name="premiacao">
            </div>

            <div class="campo-formulario">
                <label for="data_sorteio">Data do sorteio</label>
                <input class="form-input" type="date" value="{{ $rifa->data_sorteio }}" name="data_sorteio">
            </div>

            <div class="campo-formulario">
                <label for="horario_sorteio">Horário do sorteio</label>
                <input class="form-input" type="time" min="" step="600" placeholder="Selecione o horario do sorteio" name="horario_sorteio">
            </div>

            <div class="row">

                @if (isset($rifa->imagem))
                <div class="preview-imagem">
                    <p>Imagem atual:</p>
                    <img src="{{ asset('img/raffles/' . $rifa->imagem) }}" alt="Imagem da rifa" width="140" height="140" style="border: solid 2px var(--black); object-fit: cover;">
                </div>
                @endif

                <div class="campo-formulario">
                    <label for="imagem">Imagem</label>
                    <input class="form-input" type="file" name="imagem" accept="image/*">
                </div>
            </div>

            <button class="btn btn-submit" type="submit">Editar rifa</button>
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

        qtdCotas.addEventListener("input", calcularTotal);
        precoNumeros.addEventListener("input", calcularTotal);

        calcularTotal();
    </script>
@endsection
