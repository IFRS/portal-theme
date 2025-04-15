<form role="search" method="get" class="form-inline searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group">
    <input type="search" value="<?php echo get_search_query(); ?>" name="s" required id="portal-campo-busca" class="form-control" placeholder="Digite um termo para a busca" aria-label="Buscar em todo o portal">
    <button type="submit" class="btn btn-outline-secondary" value="Buscar">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </div>
</form>
