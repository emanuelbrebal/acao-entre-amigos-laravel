const userLogado = document.getElementById('userLogado');
const formLogout = document.getElementById('formLogout');

if (formLogout) {
    userLogado.addEventListener('click', function(event) {
        event.preventDefault();
        formLogout.style.display = (formLogout.style.display === "block") ? "none" : "block";
    });
} else {
    console.error('Elementos userLogado ou formLogout não encontrados.');
}
