require('datatables.net');
require('datatables.net-bs');
require('moment');
require('datatables.net-plugins/sorting/datetime-moment');

$.fn.dataTable.moment( 'DD/MM/YYYY HH:mm', 'pt-BR' );

$(function() {
    $('.table-editais').DataTable({
        order:      [0, 'desc'],
        searching:  false,
        paging:     false,
        info:       false,
        bAutoWidth: false,
        language: {
            "sEmptyTable":     "Nenhum Edital encontrado",
            "sInfo":           "Mostrando de _START_ até _END_ de _TOTAL_ Editais",
            "sInfoEmpty":      "Mostrando 0 até 0 de 0 Editais",
            "sInfoFiltered":   "(Filtrados de _MAX_ Editais)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ".",
            "sLengthMenu":     "_MENU_ Editais por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing":     "Processando...",
            "sZeroRecords":    "Nenhum Edital encontrado",
            "sSearch":         "Pesquisar na lista de Editais",
            "oPaginate": {
                "sNext":     "Próximo",
                "sPrevious": "Anterior",
                "sFirst":    "Primeiro",
                "sLast":     "Último"
            },
            "oAria": {
                "sSortAscending":  ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

    $('.table-arquivos').DataTable({
        order:      [0, 'desc'],
        searching:  false,
        paging:     false,
        info:       false,
        bAutoWidth: false,
        language: {
            "sEmptyTable":     "Nenhum arquivo encontrado",
            "sInfo":           "Mostrando de _START_ até _END_ de _TOTAL_ arquivos",
            "sInfoEmpty":      "Mostrando 0 até 0 de 0 arquivos",
            "sInfoFiltered":   "(Filtrados de _MAX_ arquivos)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ".",
            "sLengthMenu":     "_MENU_ arquivos por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing":     "Processando...",
            "sZeroRecords":    "Nenhum arquivo encontrado",
            "sSearch":         "Pesquisar na lista de arquivos",
            "oPaginate": {
                "sNext":     "Próximo",
                "sPrevious": "Anterior",
                "sFirst":    "Primeiro",
                "sLast":     "Último"
            },
            "oAria": {
                "sSortAscending":  ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});
