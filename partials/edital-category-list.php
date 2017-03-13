<?php
$terms = wp_list_categories(array(
    'echo' => 0,
    'title_li' => '',
    'taxonomy' => 'edital_category',
    'hide_empty' => false,
));
?>

<div class="well">
    <div class="row">
        <div class="col-xs-12">
            <h3><?php _e('Categorias'); ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul class="edital-category-list">
                <?php echo $terms; ?>
            </ul>
        </div>
    </div>
</div>
