<form role="search" method="get" class="form-inline searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group">
    <label class="visually-hidden" for="portal-campo-busca">Buscar em todo Portal</label>
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" id="portal-campo-busca" class="form-control" placeholder="Digite um termo para a busca" required>
    <span class="input-group-append">
      <button type="submit" class="btn btn-light" value="Buscar">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </span>
  </div>
</form>
