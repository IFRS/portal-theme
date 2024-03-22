<?php if (is_active_sidebar('widget-carousel')) : ?>
    <div id="carousel-home" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php dynamic_sidebar('widget-carousel'); ?>
        </div>
        <a class="carousel-control-prev" href="#carousel-home" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?php _e('Anterior', 'ifrs-portal-theme'); ?></span>
        </a>
        <a class="carousel-control-next" href="#carousel-home" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?php _e('Próximo', 'ifrs-portal-theme'); ?></span>
        </a>
    </div>
<?php endif; ?>
