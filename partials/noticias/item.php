<a href="<?php the_permalink(); ?>">
    <div class="noticia__img-wrapper">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid noticia__img')); ?>
        <?php else : ?>
            <img data-src="<?php echo get_template_directory_uri(); ?>/img/noticia-placeholder.jpg" alt="<?php the_title(); ?>" class="lazyload img-fluid noticia__img" aria-hidden="true"/>
        <?php endif; ?>
    </div>
</a>
<h2 class="noticia__titulo"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php
    $categories = get_the_category();
    $cat_name = $categories[0]->cat_name;
    $cat_ID = $categories[0]->term_id;
?>
<p class="noticia__meta">
<?php if (!is_category()) : ?>
    <span class="noticia__cartola">
        <a href="<?php echo get_category_link($cat_ID); ?>"><?php echo $cat_name; ?></a>
    </span>
    -
<?php endif; ?>
    <span class="noticia__data"><?php echo get_the_date(); ?></span>
</p>
<div class="noticia__resumo">
    <?php the_excerpt(); ?>
</div>
