<?php
$terms = wp_list_categories(array(
    'echo' => false,
    'title_li' => '',
    'taxonomy' => 'edital_category',
    'hide_empty' => false,
));
?>


<div class="row">
    <div class="col-12">
        <h3><?php _e('Categorias'); ?></h3>
        <ul class="side-list">
            <?php echo $terms; ?>
        </ul>
    </div>
</div>
