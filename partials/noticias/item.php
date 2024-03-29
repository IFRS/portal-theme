<a href="<?php the_permalink(); ?>" class="noticia__link">
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid noticia__img')); ?>
    <?php else : ?>
        <img data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noticia-placeholder.jpg" alt="" class="lazyload img-fluid noticia__img" loading="lazy" width="720" height="540" aria-hidden="true"/>
    <?php endif; ?>
    <h2 class="noticia__titulo"><?php the_title(); ?></h2>
</a>
<?php
    $categories = get_the_category();
?>
<p class="noticia__meta">
<?php if (!is_category() && !empty($categories)) : ?>
    <span class="noticia__cartola">
        <a href="<?php echo get_category_link($categories[0]->term_id); ?>"><?php echo $categories[0]->cat_name; ?></a>
    </span>
    -
<?php endif; ?>
    <span class="noticia__data" data-toggle="tooltip" data-placement="right" title="atualizado em <?php echo get_the_modified_date(); ?>"><?php echo get_the_date(); ?></span>
</p>
<div class="noticia__resumo clearfix">
    <?php the_excerpt(); ?>
</div>
