/* Tables */
document.addEventListener("DOMContentLoaded", function () {
  const tables = document.querySelectorAll(".wp-block-table > table")
  tables.forEach((table) => {
    table.classList.add('table');
  })
})
