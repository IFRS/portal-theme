require('bootstrap');
require('datatables.net-bs4');
const moment = require('moment');
require('moment/locale/pt-br');
moment.locale('pt-br');
require('datatables.net-plugins/sorting/datetime-moment');

$(function() {
    $.fn.dataTable.moment( 'DD/MM/YYYY', 'pt-br' );
    $.fn.dataTable.moment( 'DD/MM/YYYY HH:mm', 'pt-br' );

    $('.documentos__table').DataTable({
        order:      [0, 'desc'],
        searching:  true,
        paging:     true,
        pageLength: 25,
        info:       false,
        bAutoWidth: false,
        language: {
            "sEmptyTable":     "Nenhum Documento encontrado",
            "sInfo":           "Mostrando de _START_ até _END_ de _TOTAL_ Documentos",
            "sInfoEmpty":      "Mostrando 0 até 0 de 0 Documentos",
            "sInfoFiltered":   "(Filtrados de _MAX_ Documentos)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ".",
            "sLengthMenu":     "_MENU_ Documentos por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing":     "Processando...",
            "sZeroRecords":    "Nenhum Documento encontrado",
            "sSearch":         "Buscar:",
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

    $('.editais__table').DataTable({
        order:      [0, 'desc'],
        searching:  true,
        paging:     true,
        pageLength: 25,
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
            "sSearch":         "Buscar:",
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

    $('.concurso__table, .documento__table, .edital__table').DataTable({
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
