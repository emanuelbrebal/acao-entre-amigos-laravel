function atualizaEstadoCotas() {
    const numerosComprados = JSON.parse(window.dados.getAttribute("data-numeros-comprados"));
    const usuarioLogado = window.dados.getAttribute("data-usuario-logado");

    numerosComprados.forEach(cota => {
        const checkbox = document.getElementById(`checkbox-${cota.descricao}`);
        const tableData = document.getElementById(`numero_${cota.descricao}`);

        if (checkbox && tableData) {
            if (cota.comprador == usuarioLogado) {
                tableData.style.backgroundColor = "var(--orange)";
            } else {
                tableData.style.backgroundColor = "var(--grey)";
            }

            tableData.style.pointerEvents = "none";
            checkbox.disabled = true;
        }
    });
}
