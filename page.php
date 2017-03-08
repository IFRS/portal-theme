<?php get_header(); ?>

<?php the_post(); ?>

<div class="row">
    <div class="col-xs-12">
        <article class="post">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                </div>
            </div>
            <?php $children = get_pages(array('child_of' => get_the_ID())); ?>
            <?php if (count($children) > 0) : ?>
                <ul class="nav nav-tabs">
                    <?php foreach ($children as $child): ?>
                        <li role="presentation"><a href="<?php echo get_page_link($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <hr>
            <?php endif; ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="post-content">
                        <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full', array('class' => 'post-thumb'));
                            }
                        ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php get_template_part('partials/share', 'buttons'); ?>
                </div>
            </div>
        </article>
    </div>
</div>

<?php get_footer(); ?>
