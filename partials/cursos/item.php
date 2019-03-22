<?php
    $niveis = get_the_terms(get_the_ID(), 'curso_nivel');
?>
<div class="curso-item">
    <?php foreach ($niveis as $nivel) : ?>
        <span class="curso-item__nivel">
            <?php echo get_term_parents_list($nivel->term_id, 'curso_nivel', array('separator' => ' / ', 'inclusive' => false)); ?>
            <a href="<?php echo get_term_link($nivel); ?>"><?php echo $nivel->name; ?></a>
        </span>
    <?php endforeach; ?>
    <br>
    <?php if (!is_tax('curso_modalidade')) : ?><span class="curso-item__modalidade"><?php the_terms( get_the_ID(), 'curso_modalidade', '', ', ' ); ?> <i class="fas fa-grip-lines-vertical" aria-hidden="true"></i> </span><?php endif; ?>
    <span class="curso-item__turnos"><?php the_terms( get_the_ID(), 'curso_turno', '', ', ' ); ?></span>
    <h4 class="curso-item__title"><a href="<?php the_permalink(); ?>" class="curso-item__link"><?php the_title(); ?></a></h4>
</div>
