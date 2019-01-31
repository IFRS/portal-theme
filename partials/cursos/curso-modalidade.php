<div class="row">
    <div class="col-12">
        <h3 class="modalidades__title"><?php _e('Modalidade'); ?></h3>
        <ul class="modalidades__list">
        <?php
            wp_list_categories(array(
                'title_li' => '',
                'taxonomy' => 'curso_modalidade',
                'hide_empty' => false,
                'orderby' => 'term_order',
            ));
        ?>
        </ul>
    </div>
</div>
