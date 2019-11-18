<form role="search" method="get" class="form-inline searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="sr-only" for="search-field">Buscar no portal por:</label>
    <div class="input-group">
        <input type="search" value="<?php echo get_search_query(); ?>" name="s" id="search-field" class="form-control form-control-sm border-secondary searchform__field" placeholder="Buscar no portal..." required>
        <span class="input-group-append">
            <button type="submit" class="btn btn-secondary btn-sm searchform__submit" title="Buscar em todo o Portal" value="Buscar"></button>
        </span>
    </div>
</form>
