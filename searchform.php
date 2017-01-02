<form role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="sr-only" for="search-field">Buscar no portal por:</label>
    <div class="input-group">
        <input type="search" value="<?php echo get_search_query(); ?>" name="s" id="search-field" class="search-field form-control" placeholder="Buscar no portal" required>
        <span class="input-group-btn">
            <button type="submit" class="search-submit btn btn-info" title="Buscar"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div>
</form>
