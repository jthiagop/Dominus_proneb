$(document).ready(function() {
    var table = $('#datatablesSimple').DataTable({
        dom: 'Bfrtip', // Define onde os botões devem ser exibidos
        buttons: [
            {
                extend: 'csv',
                text: 'Exportar para CSV',
                className: 'btn btn-sm btn-light text-primary'
            },
            {
                extend: 'pdf',
                text: 'Exportar para PDF',
                className: 'btn btn-sm btn-light text-primary'
            },
            // Adicione mais botões conforme necessário
        ],

        responsive: true,
        scrollX: "100%",
        autoWidth: false, // Ativa a rolagem horizontal
        searching: true, // Desativa a pesquisa
        lengthChange: true, // Desativa a seleção de entradas por página

    }).draw();

    table.buttons().container().appendTo('#buttons');

    // Adicione o manipulador de eventos do clique do botão aqui
    $('.filter').on('click', function() {
        var filter = $(this).data('filter');
        if (filter === 'all') {
            table.search('').columns().search('').draw();
        } else {
            table.column(4).search(filter).draw();
        }
    });
});
