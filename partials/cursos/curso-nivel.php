<div class="row">
    <div class="col-12">
        <h3 class="niveis__title"><?php _e('Nível'); ?></h3>
        <ul class="niveis__list">
        <?php
            wp_list_categories(array(
                'title_li' => '',
                'taxonomy' => 'curso_nivel',
                'hide_empty' => false,
                'orderby' => 'term_order',
            ));
        ?>
        </ul>
    </div>
</div>
