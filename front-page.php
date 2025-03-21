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

<?php get_footer(); ?>
