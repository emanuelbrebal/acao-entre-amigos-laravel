function inicializarEventosRifa(){
    atualizarArrayQuotas();
    mostraTotalCotas();
    mostraValorTotal();
    atualizaEstadoCotas();
}
document.addEventListener('DOMContentLoaded', function() {
    inicializarEventosRifa();
});

