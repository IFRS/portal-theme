<?php
    global $template;
    $context = basename($template, '.php');
?>
<form class="inline-form" method="get" action="." role="form">
    <div class="form-goup">
        <div class="input-group">
            <label class="sr-only" for="search-<?php echo $context; ?>"><?php _e('Termo da busca'); ?></label>
            <input class="form-control form-control-sm" type="text" value="<?php echo (get_search_query() ? get_search_query() : ''); ?>" name="s" id="search-<?php echo $context; ?>" placeholder="<?php _e('Buscar cursos...'); ?>"/>
            <span class="input-group-append">
                <button type="submit" class="btn btn-sm btn-search-cursos" title="<?php _e('Buscar'); ?>"><i class="fas fa-search" aria-hidden="true"></i></button>
            </span>
        </div>
    </div>
</form>
