window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        let dataTable = new simpleDatatables.DataTable(datatablesSimple);

        // Após a inicialização do DataTable
        dataTable.on('datatable.init', function () {
            // Obtenha todas as células do cabeçalho
            let headerCells = datatablesSimple.querySelectorAll('thead th');

            // Crie uma nova instância Sortable para cada célula do cabeçalho
            headerCells.forEach(function (headerCell, index) {
                new Sortable(headerCell, {
                    // Configuração do Sortable.js
                    group: 'shared',  // Para permitir a troca de itens entre todas as colunas
                    animation: 150,
                    onEnd: function (/**Event*/evt) {
                        // Mover a coluna no DataTable quando a célula do cabeçalho é movida
                        dataTable.columns().reorder([evt.oldIndex, evt.newIndex]);
                    },
                });
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    var dataTable = new simpleDatatables.DataTable("#datatablesSimple", {
        scrollX: true,
    });
});
