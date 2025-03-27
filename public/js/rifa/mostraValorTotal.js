function mostraValorTotal() {
    const pricePerQuota = window.dados.getAttribute('data-price-per-quota');;
    const totalPrice = numerosSelecionados.size * pricePerQuota || 0;
    const totalModal = document.getElementById("total-modal");
    
    total.innerHTML = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    }).format(totalPrice);

    totalModal.innerHTML = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    }).format(totalPrice);
}