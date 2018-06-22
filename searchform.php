<form role="search" method="get" class="form-inline searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="sr-only" for="search-field">Buscar no portal por:</label>
    <div class="input-group">
        <input type="search" value="<?php echo get_search_query(); ?>" name="s" id="search-field" class="form-control searchform__field" placeholder="Buscar no portal..." required>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default searchform__submit" title="Buscar em todo o Portal" value="Buscar"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div>
</form>
