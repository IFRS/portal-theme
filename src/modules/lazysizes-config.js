require('lazysizes');

window.lazySizesConfig = window.lazySizesConfig || {};
window.lazySizesConfig.srcAttr = 'src';
window.lazySizesConfig.srcsetAttr = 'srcset';
window.lazySizesConfig.loadMode = 1;
$(function() {
    $('img[srcset]').attr('data-sizes', 'auto');
    $('img[srcset]').addClass('lazyload');
});