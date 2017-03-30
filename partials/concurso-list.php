<hr>
<div class="panel-group" id="accordion-concursos" role="tablist" aria-multiselectable="true">
<?php while (have_posts()) : the_post(); ?>
    <div class="panel panel-concurso">
        <div class="panel-heading" role="tab" id="heading-<?php the_ID(); ?>">
        <?php $status = get_the_terms(get_the_ID(), 'concurso_status'); ?>
        <?php if ($status) : ?>
            <span class="label label-primary"><?php echo $status[0]->name; ?></span>
        <?php endif; ?>
            <h3 class="panel-title">
                <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion-concursos" href="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
        </div>
        <div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>">
            <div class="panel-body">
                <?php get_template_part('partials/concurso-item'); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>
