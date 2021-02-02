<a href="<?php the_permalink(); ?>" class="noticia__link">
    <div class="noticia__img-wrapper">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid noticia__img')); ?>
        <?php else : ?>
            <img data-src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noticia-placeholder.jpg" alt="<?php the_title(); ?>" class="lazyload img-fluid noticia__img" aria-hidden="true"/>
        <?php endif; ?>
    </div>
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
    <span class="noticia__data"><?php echo get_the_date(); ?></span>
</p>
<div class="noticia__resumo clearfix">
    <?php the_excerpt(); ?>
</div>
