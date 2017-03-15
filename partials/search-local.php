<?php
    global $template;
    $context = basename($template, '.php');
?>
<form class="inline-form" method="get" action="." role="form">
    <div class="input-group">
        <label class="sr-only" for="search-<?php echo $context; ?>"><?php _e('Termo da busca'); ?></label>
        <input class="form-control" type="text" value="<?php echo (get_search_query() ? get_search_query() : ''); ?>" name="s" id="search-<?php echo $context; ?>" placeholder="<?php _e('Busca contextual...'); ?>"/>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary" title="<?php _e('Buscar no contexto'); ?>"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div>
</form>
