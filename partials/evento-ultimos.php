<?php
    global $post;

    $args = array(
        'meta_key' => 'evento_start',
        'meta_query' => array(
            array(
                'key' => 'evento_start',
                'value' => time() - (24 * 60 * 60),
                'compare' => '>='
            )
        ),
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'post_type' => 'evento',
        'numberposts' => 5
    );

    $last_eventos = new WP_Query($args);
?>
<div class="next-eventos">
    <h2 class="title-box"><?php _e('Agenda'); ?></h2>
    <?php if ($last_eventos->have_posts()) : ?>
        <?php while ($last_eventos->have_posts()) : $last_eventos->the_post(); ?>
            <p class="dates"><strong><?php echo date_i18n( 'd/m/Y', rwmb_meta( 'evento_start' ) ); ?></strong>&nbsp;<?php echo date_i18n( 'H:i', rwmb_meta( 'evento_start' ) ); ?></p>
            <h3><a href="#evento-<?php echo get_post_field( 'post_name' ); ?>" data-toggle="modal"><?php the_title(); ?></a></h3>
            <!-- Modal -->
            <div class="modal fade" id="evento-<?php echo get_post_field( 'post_name' ); ?>" tabindex="-1" role="dialog" aria-labelledby="evento-label-<?php echo get_post_field( 'post_name' ); ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="evento-label-<?php echo get_post_field( 'post_name' ); ?>"><?php the_title(); ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p><strong><?php _e('Início'); ?></strong></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <p><strong><?php _e('Término'); ?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p>
                                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo date_i18n( get_option( 'date_format' ), rwmb_meta('evento_start') ); ?>&nbsp;
                                        <span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date_i18n( 'H:i', rwmb_meta('evento_start') ); ?>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <p>
                                        <span class="glyphicon glyphicon-calendar"></span>&nbsp;<?php echo date_i18n( get_option( 'date_format' ), rwmb_meta('evento_end') ); ?>&nbsp;
                                        <span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date_i18n( 'H:i', rwmb_meta('evento_end') ); ?>
                                    </p>
                                </div>
                            </div>
                            <?php if (!empty(rwmb_meta('evento_link'))) : ?>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p><span class="glyphicon glyphicon-link"></span>&nbsp;<a href="<?php echo esc_url( rwmb_meta('evento_link') ); ?>"><?php echo esc_url( rwmb_meta('evento_link') ); ?></a></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <p><strong class="evento-location"><?php echo rwmb_meta('evento_location'); ?></strong><br>
                                    <span class="glyphicon glyphicon-map-marker"></span>&nbsp;<?php echo rwmb_meta('evento_address'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?php echo rwmb_meta('evento_map', array('type' => 'map', 'width' => '100%', 'height' => '450px')); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
