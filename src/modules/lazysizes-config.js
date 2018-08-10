require('lazysizes');

window.lazySizesConfig = window.lazySizesConfig || {};
window.lazySizesConfig.srcAttr = 'src';
window.lazySizesConfig.srcsetAttr = 'srcset';

$(function() {
    $('img[srcset]').attr('data-sizes', 'auto');
    $('img[srcset]').addClass('lazyload');
});
