<?php get_header(); ?>

<?php the_content(); ?>

<?php if (has_nav_menu( 'campi' )) : ?>
<div class="row">
  <div class="col-12">
  <?php
    if (is_front_page()) {
      get_template_part('partials/menus/campi');
    }
  ?>
  </div>
</div>
<?php endif; ?>

<?php
  $escopos = get_terms(array(
    'taxonomy' => 'escopo',
    'hide_empty' => false,
    'fields' => 'ids'
  ));

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 7,
    'tax_query' => array(
      array(
        'taxonomy' => 'escopo',
        'field' => 'term_id',
        'terms' => $escopos,
        'operator' => 'NOT IN'
      ),
    ),
  );

  $query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : $query->the_post(); ?>
  <!-- Notícia Destaque -->
  <div class="row">
    <div class="col-12">
      <article class="noticia noticia_destaque">
        <?php get_template_part('partials/noticias/item'); ?>
      </article>
    </div>
  </div>
<?php endif; ?>

<div class="row">
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <?php if ($query->current_post > 6) break; ?>
    <?php
      $noticia_class = 'noticia col-12 col-md-6 col-lg-4';

      if ($query->current_post === 4) {
        $noticia_class .= ' d-none d-md-block d-lg-block';
      } elseif ($query->current_post >= 5 ) {
        $noticia_class .= ' d-none d-lg-block';
      }
    ?>
    <!-- Notícia -->
    <article class="<?php echo $noticia_class; ?>">
      <?php get_template_part('partials/noticias/item'); ?>
    </article>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
  <div class="col-12">
    <div class="acesso-todas-noticias">
      <hr class="acesso-todas-noticias__separador">
      <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="float-right acesso-todas-noticias__link"><?php _e('Acesse mais notícias', 'ifrs-portal-theme'); ?></a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
