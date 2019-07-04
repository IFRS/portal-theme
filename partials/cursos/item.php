<?php $niveis = get_the_terms(get_the_ID(), 'curso_nivel'); ?>

<div class="card curso-item">
    <div class="card-body">
        <?php foreach (get_the_terms(get_the_ID(), 'curso_modalidade') as $modalidade) : ?>
            <span class="curso-item__modalidade"><?php echo $modalidade->name; ?></span>
        <?php endforeach; ?>
        <h2 class="card-title curso-item__title"><a href="<?php the_permalink(); ?>" class="curso-item__link"><?php the_title(); ?></a></h2>
        <p class="card-text">
            <?php foreach ($niveis as $nivel) : ?>
                <span class="curso-item__nivel">
                    <?php echo get_term_parents_list($nivel->term_id, 'curso_nivel', array('separator' => ' / ', 'inclusive' => false, 'link' => false)); ?>
                    <?php echo $nivel->name; ?>
                </span>
            <?php endforeach; ?>
        </p>
    </div>
    <div class="card-footer">
        <?php $turnos = wp_get_post_terms(get_the_ID(), 'curso_turno', array('orderby' => 'term_order')); ?>
        <?php foreach ($turnos as $turno) : ?>
            <span class="curso-item__turnos"><?php echo $turno->name; echo ($turno !== end($turnos)) ? ', ' : ''; ?></span>
        <?php endforeach; ?>
    </div>
</div>
