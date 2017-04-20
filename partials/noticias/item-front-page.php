<div class="row">
    <div class="col-xs-12">
        <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive center-block noticia-imagem')); ?>
        <?php else : ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/noticia-placeholder.png" alt="<?php the_title(); ?>" class="img-responsive center-block noticia-imagem"/>
        <?php endif; ?>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h2 class="noticia-titulo"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="noticia-resumo">
            <?php the_excerpt(); ?>
        </div>
    </div>
</div>
