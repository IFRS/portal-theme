<?php
    $modalidades = get_terms(array(
        'taxonomy' => 'curso_modalidade',
        'hide_empty' => false,
        'orderby' => 'term_order',
    ));
?>

<?php
    $unidades = get_terms(array(
        'taxonomy' => 'curso_unidade',
        'hide_empty' => false,
        'orderby' => 'term_order',
    ));
?>

<?php
    $niveis = get_terms(array(
        'taxonomy' => 'curso_nivel',
        'hide_empty' => false,
        'orderby' => 'term_order',
    ));
?>

<?php
    $turnos = get_terms(array(
        'taxonomy' => 'curso_turno',
        'hide_empty' => false,
        'orderby' => 'term_order',
    ));
?>

<aside class="filter">
    <h3 class="filter__title"><?php _e('Filtros'); ?></h3>
    <form action="." method="post" class="filter__form">
        <?php $seachfield_id = uniqid(); ?>
        <div class="input-group">
            <label class="sr-only" for="<?php echo $seachfield_id; ?>"><?php _e('Termo para busca'); ?></label>
            <input class="form-control form-control-sm" type="text" name="s" value="<?php echo (get_search_query() ? get_search_query() : ''); ?>" id="<?php echo $seachfield_id; ?>" placeholder="<?php _e('Buscar cursos...'); ?>"/>
        </div>
        <?php if (!is_tax('curso_modalidade')) : ?>
            <fieldset>
                <legend>Modalidade</legend>
                <?php foreach ($modalidades as $modalidade): ?>
                    <?php $field_id = uniqid(); ?>
                    <?php $modalidade_check = (isset($_POST['curso_modalidade']) && in_array($modalidade->slug, $_POST['curso_modalidade'])); ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="curso_modalidade[]" value="<?php echo $modalidade->slug; ?>" id="<?php echo $field_id; ?>" <?php echo $modalidade_check ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="<?php echo $field_id; ?>"><?php echo $modalidade->name; ?></label>
                    </div>
                <?php endforeach; ?>
            </fieldset>
        <?php endif; ?>
        <?php if (!is_tax('curso_unidade')) : ?>
            <fieldset>
                <legend>Unidade</legend>
                <?php foreach ($unidades as $unidade): ?>
                    <?php $field_id = uniqid(); ?>
                    <?php $unidade_check = (isset($_POST['curso_unidade']) && in_array($unidade->slug, $_POST['curso_unidade'])); ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="curso_unidade[]" value="<?php echo $unidade->slug; ?>" id="<?php echo $field_id; ?>" <?php echo $unidade_check ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="<?php echo $field_id; ?>"><?php echo $unidade->name; ?></label>
                    </div>
                <?php endforeach; ?>
            </fieldset>
        <?php endif; ?>
        <?php if (!is_tax('curso_nivel')) : ?>
            <fieldset>
                <legend>N&iacute;vel</legend>
                <?php foreach ($niveis as $nivel): ?>
                    <?php $field_id = uniqid(); ?>
                    <?php $nivel_check = (isset($_POST['curso_nivel']) && in_array($nivel->slug, $_POST['curso_nivel'])); ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="curso_nivel[]" value="<?php echo $nivel->slug; ?>" id="<?php echo $field_id; ?>" <?php echo $nivel_check ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="<?php echo $field_id; ?>"><?php echo $nivel->name; ?></label>
                    </div>
                <?php endforeach; ?>
            </fieldset>
        <?php endif; ?>
        <?php if (!is_tax('curso_turno')) : ?>
            <fieldset>
                <legend>Turno</legend>
                <?php foreach ($turnos as $turno): ?>
                    <?php $field_id = uniqid(); ?>
                    <?php $turno_check = (isset($_POST['curso_turno']) && in_array($turno->slug, $_POST['curso_turno'])); ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="curso_turno[]" value="<?php echo $turno->slug; ?>" id="<?php echo $field_id; ?>" <?php echo $turno_check ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="<?php echo $field_id; ?>"><?php echo $turno->name; ?></label>
                    </div>
                <?php endforeach; ?>
            </fieldset>
        <?php endif; ?>
        <div class="btn-group" role="group" aria-label="Ações do Filtro">
            <input type="submit" value="Filtrar" class="btn btn-primary">
            <a href="<?php echo get_post_type_archive_link( 'curso' ); ?>" class="btn btn-outline-secondary"><?php _e('Limpar Filtros', 'ifrs-portal-theme'); ?></a>
        </div>
    </form>
</aside>
