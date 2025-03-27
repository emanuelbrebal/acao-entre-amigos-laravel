function atualizarArrayQuotas() {
    const arrayQuotas = document.getElementById("array-quotas");
    const quotasCarrinho = document.getElementById("array-quotas-carrinho");
    const selectedArray = Array.from(window.numerosSelecionados).sort((a, b) => a - b);
    arrayQuotas.textContent = selectedArray.join(", ") || "Nenhuma cota selecionada";
    quotasCarrinho.textContent = selectedArray.join(", ") || "Nenhuma cota selecionada";
}