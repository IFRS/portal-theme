<div class="row">
    <div class="col-12">
        <h3><?php _e('Turno'); ?></h3>
        <ul class="side-list">
        <?php
            wp_list_categories(array(
                'title_li' => '',
                'taxonomy' => 'curso_turno',
                'hide_empty' => false,
                'orderby' => 'term_order',
            ));
        ?>
        </ul>
    </div>
</div>
