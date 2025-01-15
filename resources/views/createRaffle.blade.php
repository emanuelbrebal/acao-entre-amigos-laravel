@extends('layouts.loginLayout')
@section('title', 'Cadastrar nova Rifa')
@section('content')

    <section class="cadastro-main">
        <div class="informacoes-cadastro">
            <h1 class="form-title">Criar Rifa</h1>
            <h5>Insira os dados de como deseja a sua rifa. Os dados poderão ser editados depois.</h5>
        </div>
        <form class="cadastro-form" action="{{route('cadastrarRifa')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="campo-formulario">
                <label for="titulo">Título</label>
                <input class="form-input" type="text" placeholder="Digite o título da sua rifa" name="titulo_rifa" required>
            </div>

            <div class="campo-formulario numeros-options">
                <label for="qtd_numeros">Quantidade de cotas</label>
                <select class="form-input" name="qtd_num" id="" required>
                    <option value="" disabled selected>Selecione a quantidade</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                </select>
            </div>

            <div class="campo-formulario">
                <label for="preco_numeros">Valor de cada cota</label>
                <select class="form-input" name="preco_numeros" id="preco_numeros" required>
                    <option value="" disabled selected>Selecione o valor</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="outro">Outro</option>
                </select>

                {{-- <div class="campo-formulario -valor-outro" style="display: none">
                    <label for="preco_numeros">Valor de cada cota</label>
                    <input class="form-input" type="number" placeholder="Digite o valor desejado" name="preco_numeros"
                        id="preco_numeros">
                </div> --}}

                <div class="valor_total"></div>
            </div>

            <div class="campo-formulario">
                <label for="premiacao">Premiação</label>
                <input class="form-input" type="text" placeholder="Qual será a premiação do sorteio?" name="premiacao" required>
            </div>

            <div class="campo-formulario">
                <label for="data_sorteio">Data do sorteio</label>
                <input class="form-input" type="date" placeholder="Selecione a data do sorteio" name="data_sorteio" required>
            </div>

            <div class="campo-formulario">
                <label for="imagem">Imagem</label>
                <input class="form-input" type="file" placeholder="Selecione uma imagem" name="imagem" required>
            </div>
            <div class="campo-formulario">
                <label for="imagem">Instituição responsável.</label>
                <input class="form-input" type="text" placeholder="id da instituicao" name="id_instituicao" disabled>
            </div>
            <button class="btn btn-submit" type="submit">Criar rifa</button>
        </form>
    </section>

    <script>
        // fazer a conta a partir do valor inserido no input number e no select de qtd de cotas
        const divValorTotal = document.querySelector('.valor_total');
        const qtdCotas = document.getElementById('qtd_num');
        const preco_numeros = document.getElementById('preco_numeros');
    </script>
@endsection
