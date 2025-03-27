function formataCelular(input) {
    let valor = input.value.replace(/\D/g, ""); 

    if (valor.length > 11) valor = valor.slice(0, 11); 

    valor = valor.replace(/(\d{2})(\d)/, "($1) $2"); 
    valor = valor.replace(/(\d{5})(\d)/, "$1-$2"); 

    input.value = valor;
}