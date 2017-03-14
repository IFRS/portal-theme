<form class="inline-form" method="get" action="<?php echo get_post_type_archive_link( 'edital' ); ?>" role="form">
    <div class="input-group">
        <label class="sr-only" for="s"><?php _e('Termo da busca'); ?></label>
        <input class="form-control" type="text" value="<?php echo (get_search_query() ? get_search_query() : ''); ?>" name="s" id="s" placeholder="<?php _e('Buscar Editais...'); ?>"/>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><?php _e('Buscar'); ?></button>
        </span>
    </div>
</form>
