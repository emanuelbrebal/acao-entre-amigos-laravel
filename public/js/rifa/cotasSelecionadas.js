document.addEventListener("DOMContentLoaded", function() {
    
    let cotasSelecionadas = [];
    document.getElementById("btnCompraRifas").addEventListener("click", function() {
        cotasSelecionadas = document.getElementById("array-quotas-carrinho").innerText.trim();
        document.getElementById("selecionados").value = cotasSelecionadas;
        console.log(cotasSelecionadas);
    });

    document.getElementById("form-selecionados").addEventListener("submit", function() {
        let idRifaInput = document.getElementById("id_rifa");
        if (!idRifaInput.value) {
            idRifaInput.value = "{{ $rifa->id }}";
        }
    });

});