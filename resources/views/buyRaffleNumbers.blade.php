@extends('layouts.loginLayout')
@section('title', 'Cadastrar nova Rifa')
@section('content')

    <section class="cadastro-main">
        <div class="informacoes-cadastro">
            <h1 class="form-title">Comprar cotas Rifa</h1>

        </div>
        <form class="cadastro-form" action="{{route('cadastrarRifa')}}" method="POST" enctype="multipart/form-data">
            @csrf

        </form>
    </section>

    <script>
        const divValorTotal = document.querySelector('.valor_total');
        const qtdCotas = document.getElementById('qtd_num');
        const preco_numeros = document.getElementById('preco_numeros');
    </script>
@endsection
