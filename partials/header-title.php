<div class="title">
    <h1 class="sr-only"><?php bloginfo('name'); ?></h1>
    <?php if (get_header_image() != '') : ?>
        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" class="img-fluid title__logo"/></a>
    <?php endif; ?>
</div>
