document.addEventListener('DOMContentLoaded', function() {
    const cpf = document.getElementById('cpf');
    const celular = document.getElementById('celular');
    const cnpj = document.getElementById('cnpj');

    if (cpf && cpf.value) formataCPF(cpf);
    if (celular && celular.value) formataCelular(celular);
    if (cnpj && cnpj.value) formataCNPJ(cnpj);
});
