<?php get_header(); ?>

<?php the_post(); ?>

<div class="row">
    <div class="col-xs-12 col-md-9">
        <article class="post">
            <div class="row">
                <div class="col-xs-12">
                    <?php
                        $categories = get_the_category();
                        $cat_name = $categories[0]->cat_name;
                    ?>
                    <p class="post-category"><?php echo $cat_name; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <small class="post-date">
                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;publicado em <?php the_time('d'); ?> de <?php the_time('F'); ?> de <?php the_time('Y'); ?>
                        <br>
                        <?php if (get_the_modified_time() != get_the_time()) : ?><span class="glyphicon glyphicon-calendar"></span>&nbsp;&uacute;ltima modifica&ccedil;&atilde;o em <?php the_modified_time('d'); ?> de <?php the_modified_time('F'); ?> de <?php the_modified_time('Y'); ?> <?php endif; ?>
                    </small>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php get_template_part('partials/share', 'buttons'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="post-content">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="wp-caption post-thumb">
                                <a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[0]; ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></a>
                                <?php if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
                                    <p class="wp-caption-text"><?php echo $caption; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php $tags = get_the_tags(); ?>
            <?php if (!empty($tags)) : ?>
                <hr class="post-to-tags-separator">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="post-tags">
                            <?php foreach ($tags as $tag) : ?>
                                <li><a class="btn btn-default btn-sm" href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </article>
    </div>
    <div class="col-xs-12 col-md-3">
        <?php get_template_part('partials/noticias/latest'); ?>
    </div>
</div>

<?php get_footer(); ?>
