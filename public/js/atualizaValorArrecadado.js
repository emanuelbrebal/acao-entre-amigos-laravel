
const pValorArrecadado = document.getElementById('valor-total-arrecadado');
const qtdCotas = document.getElementById('qtd_numeros');
const precoNumeros = document.getElementById('preco_numeros');

function calcularTotal() {
    const quantidade = parseInt(qtdCotas.value, 10);
    const preco = parseFloat(precoNumeros.value);


    if (!isNaN(quantidade) && !isNaN(preco)) {
        const valorTotal = quantidade * preco;
        pValorArrecadado.innerText = `R$ ${valorTotal.toFixed(2).replace('.', ',')}`; 
    }
}

qtdCotas.addEventListener("input", calcularTotal);
precoNumeros.addEventListener("input", calcularTotal);

calcularTotal();
