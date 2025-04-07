function atualizaEstadoCotas(input) {
    const numerosComprados = JSON.parse(window.dados.getAttribute("data-numeros-comprados"));
    const usuarioLogado = window.dados.getAttribute("data-usuario-logado");

    if (!window.numerosSelecionados) {
        window.numerosSelecionados = new Set();
    }

    const valorSelecionado = input.value;
    if(input.checked){
        input.parentElement.classList.add("-selecionada");
        adicionarValorSelecionado(valorSelecionado);
        atualizarArrayQuotas();
        mostraValorTotal();
    }
    else{
        input.parentElement.classList.remove("-selecionada");
        removerValorSelecionado(valorSelecionado);
        atualizarArrayQuotas();
        mostraValorTotal();
    }
    mostraTotalCotas();
    // sessionStorage TODO
}

function adicionarValorSelecionado(valor){
    window.numerosSelecionados.add(valor);
}

function removerValorSelecionado(valor){
    window.numerosSelecionados.delete(valor);
}
