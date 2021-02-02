<?php
    global $template;
    $context = basename($template, '.php');
?>
<form class="inline-form" method="get" action="." role="form">
    <div class="form-goup">
        <div class="input-group">
            <label class="sr-only" for="search-<?php echo $context; ?>"><?php _e('Termo da busca', 'ifrs-portal-theme'); ?></label>
            <input class="form-control" type="text" value="<?php echo (get_search_query() ? get_search_query() : ''); ?>" name="s" id="search-<?php echo $context; ?>" placeholder="<?php _e('Busca contextual...', 'ifrs-portal-theme'); ?>"/>
            <span class="input-group-append">
                <button type="submit" class="btn btn-primary" title="<?php _e('Buscar no contexto', 'ifrs-portal-theme'); ?>">Ir</button>
            </span>
        </div>
        <p class="form-text"><?php _e('Retorna os resultados somente sobre a p&aacute;gina atual.', 'ifrs-portal-theme'); ?></p>
    </div>
</form>
