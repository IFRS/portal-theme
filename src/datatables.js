import { Settings } from 'luxon'
import DataTable from 'datatables.net-bs5'
import 'datatables.net-responsive-bs5'

Settings.defaultLocale = "pt-BR"

// REGISTRA os formatos de data usados nas células
DataTable.datetime('dd/MM/yyyy', 'pt-BR')
DataTable.datetime('dd/MM/yyyy HH:mm', 'pt-BR')

const commonLanguage = {
  "sInfoPostFix": "",
  "sInfoThousands": ".",
  "sLoadingRecords": "Carregando...",
  "sProcessing": "Processando...",
  "oPaginate": {
    "sNext": "&#12297;",
    "sPrevious": "&#12296;",
    "sFirst": "&#12298;",
    "sLast": "&#12299;"
  },
  "oAria": {
    "sSortAscending": ": Ordenar colunas de forma ascendente",
    "sSortDescending": ": Ordenar colunas de forma descendente"
  }
}

function initDataTableIfExists(selector, options) {
  if (!document.querySelector(selector)) return

  new DataTable(selector, options)
}

initDataTableIfExists('.documentos__table', {
  order: [[0, 'desc'], [2, 'desc']],
  columnDefs: [
    { targets: 0, type: 'datetime-dd/MM/yyyy HH:mm' },
    { targets: 2, type: 'datetime-dd/MM/yyyy' }
  ],
  searching: true,
  paging: true,
  pageLength: 10,
  info: true,
  bAutoWidth: false,
  responsive: true,
  language: {
    ...commonLanguage,
    "sEmptyTable": "Nenhum Documento encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ Documentos",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 Documentos",
    "sInfoFiltered": "(Filtrados de _MAX_ Documentos)",
    "sLengthMenu": "_MENU_ Documentos por página",
    "sZeroRecords": "Nenhum Documento encontrado",
    "sSearch": "Buscar:"
  }
})

initDataTableIfExists('.editais__table', {
  order: [[0, 'desc'], [2, 'desc']],
  columnDefs: [
    { targets: 0, type: 'datetime-dd/MM/yyyy HH:mm' },
    { targets: 2, type: 'datetime-dd/MM/yyyy' }
  ],
  searching: true,
  paging: true,
  pageLength: 10,
  info: true,
  bAutoWidth: false,
  responsive: true,
  language: {
    ...commonLanguage,
    "sEmptyTable": "Nenhum Edital encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ Editais",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 Editais",
    "sInfoFiltered": "(Filtrados de _MAX_ Editais)",
    "sLengthMenu": "_MENU_ Editais por página",
    "sZeroRecords": "Nenhum Edital encontrado",
    "sSearch": "Buscar:"
  }
})

initDataTableIfExists('.concurso__table, .documento__table, .edital__table', {
  order: [],
  searching: false,
  paging: false,
  info: false,
  bAutoWidth: false,
  responsive: true,
  language: {
    ...commonLanguage,
    "sEmptyTable": "Nenhum arquivo encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ arquivos",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 arquivos",
    "sInfoFiltered": "(Filtrados de _MAX_ arquivos)",
    "sLengthMenu": "_MENU_ arquivos por página",
    "sZeroRecords": "Nenhum arquivo encontrado",
    "sSearch": "Pesquisar na lista de arquivos"
  }
})
