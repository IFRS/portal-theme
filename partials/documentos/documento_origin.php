<div class="row">
    <div class="col-xs-12">
        <h3 class="title-box"><?php _e('Origens'); ?></h3>
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
