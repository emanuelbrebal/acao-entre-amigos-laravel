function mostraValorTotal() {
    if (!window.numerosSelecionados) {
        window.numerosSelecionados = new Set();
    }
    const pricePerQuota = window.dados.getAttribute('data-price-per-quota');
    const totalPrice = window.numerosSelecionados.size != 0 ? window.numerosSelecionados.size * parseInt(pricePerQuota) : 0;
    const totalModal = document.getElementById("total-modal");
    const total = document.getElementById("total");
    
    total.innerText = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    }).format(totalPrice);

    totalModal.innerText = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    }).format(totalPrice);
}
