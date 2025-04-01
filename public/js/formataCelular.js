function formataCelular(campo) {
    let valor = campo.value.replace(/\D/g, '');

    if (valor.length > 10) {
        valor = valor.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    } else if (valor.length > 6) {
        valor = valor.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
    } else if (valor.length > 2) {
        valor = valor.replace(/(\d{2})(\d{4})/, '($1) $2');
    } else if (valor.length > 0) {
        valor = valor.replace(/(\d{2})/, '($1)');
    }

    campo.value = valor;
}
