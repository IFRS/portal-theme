<?php while ( have_posts() ) : the_post(); ?>
    <article class="documento">
        <div class="row">
            <div class="documento-date-time col-xs-12 col-md-2">
                <p class="documento-date"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo get_the_date('d/m/Y'); ?></p>
                <p class="documento-time"><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo get_the_time('G\hi'); ?></p>
            </div>
            <div class="documento-body col-xs-12 col-md-10">
                <?php if (is_post_type_archive('documento')) : ?>
                    <p class="documento-type"><?php echo get_the_terms(get_the_ID(), 'documento_type')[0]->name; ?></p>
                <?php endif; ?>
                <h3 class="documento-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                <div class="documento-content">
                    <?php the_excerpt(); ?>
                </div>
                <?php $arquivo = rwmb_meta('documento_file', array('limit' => 1)); ?>
                <a href="<?php echo $arquivo[0]['url']; ?>" title="Baixar <?php the_title(); ?>" data-toggle="tooltip" data-placement="right"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;Baixar arquivo diretamente</a>
            </div>
        </div>
    </article>
<?php endwhile; ?>
