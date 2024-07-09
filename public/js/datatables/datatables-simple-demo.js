window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});


$(document).ready(function() {
    var table = $('#datatablesSimple').DataTable({
        "scrollY": "400px", // Altura do contêiner de rolagem
        "scrollCollapse": true, // Reduz o tamanho da tabela para se ajustar ao contêiner de rolagem
        "pageLength": 50, // Define a quantidade de registros por página para 50
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]], // Define as opções do menu suspenso para 10, 25, 50 e "Todos"
        "order": [[ 0, "desc" ]], // 0 é o índice da coluna ID
        "language": {
            "lengthMenu": "Show _MENU_",
            "url":"/public/js/datatables/pt_br.json"
        },

        dom:
            "<'row mb-2'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
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

    "use strict";

// Class definition
var KTDatatablesExample = function () {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    var initDatatable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 4th column in table
            dateRow[3].setAttribute('data-order', realDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            'pageLength': 10,
        });
    }

    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'Customer Orders Report';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('#kt_datatable_example_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Public methods
    return {
        init: function () {
            table = document.querySelector('#kt_datatable_example');

            if ( !table ) {
                return;
            }

            initDatatable();
            exportButtons();
            handleSearchDatatable();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesExample.init();
});



});
