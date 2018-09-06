<div class="row">
    <div class="col-12">
        <h3><?php _e('Status'); ?></h3>
        <ul class="side-list">
        <?php
            wp_list_categories(array(
                'title_li' => '',
                'taxonomy' => 'concurso_status',
                'hide_empty' => false,
            ));
        ?>
        </ul>
    </div>
</div>
