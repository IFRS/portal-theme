<div class="row">
    <div class="col-12">
        <?php
            global $post;

            $args = array(
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'post',
                'posts_per_page' => 10,
                'post__not_in' => array($post->ID)
            );

            $last_posts = get_posts($args);
        ?>
        <?php if (!empty($last_posts)) : ?>
            <div class="ultimos-posts">
                <h2 class="ultimos-posts__title">&Uacute;ltimas Not&iacute;cias</h2>
                <?php foreach ($last_posts as $post) : ?>
                    <h3 class="ultimos-posts__post-title"><a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark"><?php echo $post->post_title; ?></a></h3>
                    <p class="ultimos-posts__post-date"><?php echo get_the_date('d/m/Y', $post->ID); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
