document.addEventListener("DOMContentLoaded", () => {
    const maxItems = 200;
    let paginationIndex = 0;
    const anterior = document.getElementById("pageDecrement");
    const proximo = document.getElementById("pageIncrement");
    const tabelaNumeros = document.getElementById("tabelaNumeros");
    const divPagination = document.getElementById("pagination");
    const qtdNum = parseInt(window.dados.getAttribute("data-qtd-num"));
    const totalPages = Math.ceil(qtdNum / maxItems);

    function gerarTabela(index) {
        tabelaNumeros.innerHTML = "";
        const start = index * maxItems + 1;
        const end = Math.min(start + maxItems - 1, qtdNum);
        let tableRow = document.createElement("tr");

        for (let i = start; i <= end; i++) {
            const tableData = document.createElement("td");
            tableData.classList.add("numero");
            tableData.id = `numero_${i}`;

            const divQuota = document.createElement("div");
            divQuota.classList.add("div-quota");

            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.value = i;
            checkbox.classList.add("check-quota");
            checkbox.id = `checkbox-${i}`;
            checkbox.checked = window.numerosSelecionados.has(i);

            if (checkbox.checked) {
                tableData.style.backgroundColor = "var(--primary-green)";
            }

            const label = document.createElement("label");
            label.htmlFor = `checkbox-${i}`;
            label.classList.add("label-quota");
            label.textContent = i;

            checkbox.addEventListener("click", () => {
                if (checkbox.checked) {
                    window.numerosSelecionados.add(i);
                    tableData.style.backgroundColor = "var(--primary-green)";
                } else {
                    window.numerosSelecionados.delete(i);
                    tableData.style.backgroundColor = "";
                }

                atualizarArrayQuotas();
                mostraTotalCotas();
                mostraValorTotal();
            });

            divQuota.appendChild(checkbox);
            divQuota.appendChild(label);

            tableData.appendChild(divQuota);
            tableRow.appendChild(tableData);

            if (i % 20 === 0 || i === end) {
                tabelaNumeros.appendChild(tableRow);
                tableRow = document.createElement("tr");
            }
        }


    }
    if (anterior && proximo) {
        anterior.addEventListener("click", (event) => {
            event.preventDefault();
            if (paginationIndex > 0) {
                paginationIndex--;
                gerarTabela(paginationIndex);
                atualizaEstadoCotas();
            }
        });

        proximo.addEventListener("click", (event) => {
            event.preventDefault();
            if (paginationIndex < totalPages - 1) {
                paginationIndex++;
                gerarTabela(paginationIndex);
                atualizaEstadoCotas();
            }
        });
        const btnReset = document.getElementById("btnReset");
        btnReset.addEventListener("click", () => {
            window.numerosSelecionados.clear();
            gerarTabela(paginationIndex);
            atualizaEstadoCotas();
            atualizarArrayQuotas();
            mostraTotalCotas();
            mostraValorTotal();
        });
    }

    gerarTabela(paginationIndex);
    atualizaEstadoCotas();
});

