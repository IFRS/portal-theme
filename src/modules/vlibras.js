document.addEventListener('DOMContentLoaded', () => {
    let vlibras = document.getElementById('vlibras-js');
    if (vlibras) {
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    }
});
