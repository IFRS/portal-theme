<?php get_header(); ?>

<?php the_post(); ?>

<div class="row">
    <div class="col-12 col-lg-9">
        <article class="post">
            <?php
                $categories = get_the_category();
                $cat_name = $categories[0]->cat_name;
            ?>
            <p class="post__category"><?php echo $cat_name; ?></p>
            <h2 class="post__title"><?php the_title(); ?></h2>
            <hr class="post__separator">
            <div class="row">
                <div class="col-12 col-md-6">
                    <small class="post__date">
                        <span class="post__published">publicado em <?php the_time('d'); ?> de <?php the_time('F'); ?> de <?php the_time('Y'); ?></span>
                        <br>
                        <?php if (get_the_modified_time() != get_the_time()) : ?><span class="post__updated">&uacute;ltima modifica&ccedil;&atilde;o em <?php the_modified_time('d'); ?> de <?php the_modified_time('F'); ?> de <?php the_modified_time('Y'); ?></span><?php endif; ?>
                    </small>
                </div>
            </div>
            <div class="post__content">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="wp-caption post__thumb">
                        <a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[0]; ?>"><?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?></a>
                        <?php if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
                            <p class="wp-caption-text"><?php echo $caption; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
            <?php $tags = get_the_tags(); ?>
            <?php if (!empty($tags)) : ?>
                <hr class="post__tags-separator">
                <ul class="post__tags">
                    <?php foreach ($tags as $tag) : ?>
                        <li class="post__tag"><a class="btn btn-outline-secondary btn-sm" href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </article>
    </div>
    <div class="col-12 col-lg-3">
        <?php get_template_part('partials/noticias/latest'); ?>
    </div>
</div>

<?php get_footer(); ?>
