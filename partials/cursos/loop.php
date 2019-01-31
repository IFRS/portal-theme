<?php if (is_post_type_archive('curso') || is_tax('curso_modalidade') || is_tax('curso_turno')) : ?>
    <?php
        $niveis_pai = get_terms(array(
            'taxonomy' => 'curso_nivel',
            'hide_empty' => true,
            'parent' => 0,
        ));
    ?>
    <?php foreach ($niveis_pai as $pai) : ?>
        <?php $filhos = get_term_children($pai->term_id, 'curso_nivel'); ?>
        <div class="nivel">
            <h3 class="nivel__title">
                <a href="<?php echo esc_url(get_term_link($pai)); ?>" id="button-nivel-<?php echo $pai->term_id; ?>" data-toggle="collapse" data-target="#collapse-nivel-<?php echo $pai->term_id; ?>" aria-expanded="true" aria-controls="collapse-nivel-<?php echo $pai->term_id; ?>">
                    <?php echo $pai->name; ?>
                </a>
            </h3>
            <?php
                $args = array(
                    'post_type' => 'curso',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'curso_nivel',
                            'terms'    => $filhos,
                        ),
                    ),
                );
                $cursos = new WP_Query($args);
            ?>
            <div id="collapse-nivel-<?php echo $pai->term_id; ?>" class="collapse show" aria-labelledby="button-nivel-<?php echo $pai->term_id; ?>">
                <div class="nivel__content">
                    <?php if ($cursos->have_posts()) : ?>
                        <?php while ($cursos->have_posts()) : $cursos->the_post(); ?>
                            <?php get_template_part('partials/cursos/item'); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php elseif (is_tax('curso_nivel')) : ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('partials/cursos/item'); ?>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>
