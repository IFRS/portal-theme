<div class="curso">
    <p class="curso__nivel"><?php the_terms( get_the_ID(), 'curso_nivel', '', ' / ' ); ?></p>
    <h4 class="curso__title"><a href="<?php the_permalink(); ?>" class="curso__link"><?php the_title(); ?></a></h4>
</div>
