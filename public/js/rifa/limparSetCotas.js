const btnReset = document.getElementById("btnReset");
btnReset.addEventListener("click", () => {
    window.numerosSelecionados.forEach(numero => {
        const checkbox = document.getElementById(`checkbox-${numero}`)
        console.log(checkbox);
        if(checkbox){
            checkbox.checked = false;
            checkbox.parentElement.classList.remove('-selecionada');
        } else{
            console.warn(`Checkbox com ID "checkbox-${numero}" não encontrado.`);
        }
    });
    window.numerosSelecionados.clear();
    inicializarEventosRifa();
});
