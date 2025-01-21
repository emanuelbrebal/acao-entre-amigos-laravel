document.addEventListener('DOMContentLoaded', function () {
    const userLogado = document.getElementById('userLogado');
    const btnLogado = document.getElementById('btn-logout');

    if (userLogado && btnLogado) {
        console.log(`user logado: ${userLogado}, form logado: ${btnLogado}`);

        userLogado.addEventListener('click', function (event) {
            event.preventDefault();
            btnLogado.style.display = btnLogado.style.display === "block" ? "none" : "block";
        });
    } else {
        console.error('Elementos userLogado ou btnLogado não encontrados.');
    }
});


