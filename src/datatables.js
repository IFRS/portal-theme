import moment from 'moment'
import 'moment/locale/pt-br.js'
import DataTable from 'datatables.net-bs5'
import 'datatables.net-responsive-bs5'

moment.locale('pt-br')

// REGISTRA os formatos de data usados nas células
DataTable.datetime('DD/MM/YYYY', 'pt-br');
DataTable.datetime('DD/MM/YYYY HH:mm', 'pt-br');

new DataTable('.documentos__table', {
  order:      [[0, 'desc'], [2, 'desc']],
  columnDefs: [
    { targets: 0, type: 'datetime-DD/MM/YYYY HH:mm' },
    { targets: 2, type: 'datetime-DD/MM/YYYY' }
  ],
  searching:  true,
  paging:     true,
  pageLength: 10,
  info:       true,
  bAutoWidth: false,
  responsive: true,
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
      "sNext":     "&#12297;",
      "sPrevious": "&#12296;",
      "sFirst":    "&#12298;",
      "sLast":     "&#12299;"
    },
    "oAria": {
      "sSortAscending":  ": Ordenar colunas de forma ascendente",
      "sSortDescending": ": Ordenar colunas de forma descendente"
    }
  }
})

new DataTable('.editais__table', {
  order:      [[0, 'desc'], [2, 'desc']],
  columnDefs: [
    { targets: 0, type: 'datetime-DD/MM/YYYY HH:mm' },
    { targets: 2, type: 'datetime-DD/MM/YYYY' }
  ],
  searching:  true,
  paging:     true,
  pageLength: 10,
  info:       true,
  bAutoWidth: false,
  responsive: true,
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
      "sNext":     "&#12297;",
      "sPrevious": "&#12296;",
      "sFirst":    "&#12298;",
      "sLast":     "&#12299;"
    },
    "oAria": {
      "sSortAscending":  ": Ordenar colunas de forma ascendente",
      "sSortDescending": ": Ordenar colunas de forma descendente"
    }
  }
})

new DataTable('.concurso__table, .documento__table, .edital__table', {
  order: [],
  searching:  false,
  paging:     false,
  info:       false,
  bAutoWidth: false,
  responsive: true,
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
      "sNext":     "&#12297;",
      "sPrevious": "&#12296;",
      "sFirst":    "&#12298;",
      "sLast":     "&#12299;"
    },
    "oAria": {
      "sSortAscending":  ": Ordenar colunas de forma ascendente",
      "sSortDescending": ": Ordenar colunas de forma descendente"
    }
  }
})
