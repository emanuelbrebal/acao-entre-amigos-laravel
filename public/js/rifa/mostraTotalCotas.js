function mostraTotalCotas() {
    const qtdQuotas = document.getElementById("qtdQuotas");
    if (!window.numerosSelecionados) {
        window.numerosSelecionados = new Set();
    }
    const tamanhoSet = window.numerosSelecionados.size;

    qtdQuotas.innerText = tamanhoSet == 0 ? "Nenhuma." : tamanhoSet;
}
