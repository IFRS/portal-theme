<?php if (get_header_image() != '') : ?>
    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive"/></a>
<?php endif; ?>
