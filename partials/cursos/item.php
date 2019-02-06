<?php
    $niveis = get_the_terms(get_the_ID(), 'curso_nivel');
?>
<div class="curso">
    <?php foreach ($niveis as $nivel) : ?>
        <span class="curso__nivel">
            <?php echo get_term_parents_list($nivel->term_id, 'curso_nivel', array('separator' => ' / ', 'inclusive' => false)); ?>
            <a href="<?php echo get_term_link($nivel); ?>"><?php echo $nivel->name; ?></a>
        </span>
    <?php endforeach; ?>
    <h4 class="curso__title"><a href="<?php the_permalink(); ?>" class="curso__link"><?php the_title(); ?></a></h4>
    <?php if (!is_tax('curso_modalidade')) : ?><span class="curso__modalidade"><?php the_terms( get_the_ID(), 'curso_modalidade', '', ', ' ); ?> | </span><?php endif; ?>
    <span class="curso__turnos"><?php the_terms( get_the_ID(), 'curso_turno', '', ', ' ); ?></span>
</div>
