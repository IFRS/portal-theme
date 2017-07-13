<article id="concurso">
    <div class="row">
        <div class="col-xs-12">
            <?php $status = get_the_terms(get_the_ID(), 'concurso_status'); ?>
            <h2 class="title"><?php the_title(); ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php if ($status) : ?>
                <span class="label label-primary pull-right"><?php echo $status[0]->name; ?></span>
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part('partials/concursos/item'); ?>
</article>
<div class="row">
    <div class="col-xs-12">
        <?php get_template_part('partials/share-buttons'); ?>
    </div>
</div>
