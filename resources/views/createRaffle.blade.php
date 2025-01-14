@extends('layouts.loginLayout')
@section('title', 'Cadastrar nova Rifa')
@section('content')

<section class="cadastro-main">
    <form class="cadastro-form" action="">
        <h1 class="form-title">Criar Rifa</h1>
        <h5>Insira os dados de como deseja a sua rifa. Os dados poderão ser editados depois.</h5>
        <label for="titulo">Título</label>
        <input class="form-input" type="text" placeholder="Digite o Título da sua rifa">

        <div class="numeros-options">
            <label for="qtd_numeros">Quantidade de cotas</label>
            <select class="form-input" name="" id="">
                <option value="">10</option>
                <option value="">25</option>
                <option value="">50</option>
                <option value="">100</option>
                <option value="">1000</option>
                <option value="">2000</option>
            </select>

            <label for="">Valor do número</label>
            <input class="form-input" type="number">
        </div>

    </form>
</section>
@endsection
