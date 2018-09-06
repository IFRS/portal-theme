<div class="accordion" id="accordion-concursos" role="tablist" aria-multiselectable="true">
<?php while (have_posts()) : the_post(); ?>
    <div class="card card-concurso">
        <div class="card-header" role="tab" id="heading-<?php the_ID(); ?>">
        <?php $status = get_the_terms(get_the_ID(), 'concurso_status'); ?>
        <?php if ($status && is_post_type_archive('concurso')) : ?>
            <span class="badge badge-info p-2"><?php echo $status[0]->name; ?></span>
        <?php endif; ?>
            <h3>
                <a href="#collapse-<?php the_ID(); ?>" class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-target="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
        </div>
        <div id="collapse-<?php the_ID(); ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>" data-parent="#accordion-concursos">
            <div class="card-body">
                <?php get_template_part('partials/concursos/item'); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>
