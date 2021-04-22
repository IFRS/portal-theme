<div class="title">
    <h1 class="sr-only"><?php bloginfo('name'); ?></h1>
    <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
    <?php else : ?>
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ifrs.png" alt="<?php bloginfo('name'); ?>" class="img-fluid title__logo" <?php echo getimagesize(get_stylesheet_directory() . '/img/ifrs.png')[3]; ?>/>
        </a>
    <?php endif; ?>
</div>
