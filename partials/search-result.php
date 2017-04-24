<div class="row search-result">
    <div class="col-xs-12">
        <h3 class="search-result-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>
    <div class="col-xs-12">
        <p class="search-result-link"><?php the_permalink(); ?></p>
    </div>
    <div class="col-xs-12">
        <?php the_excerpt(); ?>
    </div>
</div>
