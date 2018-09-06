<div class="row">
    <div class="col-12">
        <h3><?php _e('Origens'); ?></h3>
        <ul class="side-list">
        <?php
            wp_list_categories(array(
                'title_li' => '',
                'taxonomy' => 'documento_origin',
                'hide_empty' => false,
            ));
        ?>
        </ul>
    </div>
</div>
