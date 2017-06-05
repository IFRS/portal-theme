<?php while ( have_posts() ) : the_post(); ?>
    <article class="documento">
        <div class="row">
            <div class="documento-date-time col-xs-12 col-md-2">
                <p class="documento-date"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo get_the_date('d/m/Y'); ?></p>
                <p class="documento-time"><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo get_the_time('G\hi'); ?></p>
            </div>
            <div class="documento-body col-xs-12 col-md-10">
                <?php $documento_origin_list = get_the_terms( get_the_ID(), 'documento_origin' ); ?>
                <p class="documento-type">
                    <?php if (is_post_type_archive('documento') || is_tax('documento_origin')) : ?>
                        <?php echo get_the_terms(get_the_ID(), 'documento_type')[0]->name; ?>
                    <?php endif; ?>
                    <?php if ($documento_origin_list && !is_tax('documento_origin')) : ?>
                        <?php if (!is_tax('documento_type')) : ?>
                            <?php echo ' - '; ?>
                        <?php endif; ?>
                        <?php echo $documento_origin_list[0]->name; ?>
                    <?php endif; ?>
                </p>
                <h3 class="documento-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                <div class="documento-content">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
    </article>
<?php endwhile; ?>
