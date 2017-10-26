<h1 class="sr-only"><?php bloginfo('name'); ?></h1>
<?php if (get_header_image() != '') : ?>
    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive"/></a>
<?php endif; ?>
<div class="row">
    <div class="col-xs-12">
        <p class="title-mec"><?php _e('Ministério da Educação'); ?></p>
    </div>
</div>
