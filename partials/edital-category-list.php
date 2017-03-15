<?php
$terms = wp_list_categories(array(
    'echo' => false,
    'title_li' => '',
    'taxonomy' => 'edital_category',
    'hide_empty' => false,
));
?>


<div class="row">
    <div class="col-xs-12">
        <h3 class="title-box"><?php _e('Categorias'); ?></h3>
        <ul class="edital-category-list">
            <?php echo $terms; ?>
        </ul>
    </div>
</div>
