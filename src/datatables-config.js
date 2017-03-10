$(document).ready(function() {
    $('.table-editais').DataTable({
        searching: false,
        paging: false,
        bAutoWidth: false,
        language: {
            "sEmptyTable": "Nenhum Edital encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ Editais",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 Editais",
            "sInfoFiltered": "(Filtrados de _MAX_ Editais)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Editais por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum Edital encontrado",
            "sSearch": "Pesquisar na lista de Editais",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});
