<?php
    $children = get_pages(
        array(
            'sort_column' => 'menu_order',
            'child_of' => get_the_ID(),
            'parent'   => get_the_ID()
        )
    );
    $parent = wp_get_post_parent_id( get_the_ID() );
?>
<?php if (count($children) > 0) : ?>
    <ul class="nav nav-pills menu-subpages">
        <!-- <?php if ($parent) : ?>
            <li><a href="<?php echo get_page_link($parent); ?>" title="Retornar ao nível anterior"><span class="glyphicon glyphicon-arrow-up"></span></a></li>
        <?php endif; ?> -->
        <?php foreach ($children as $child): ?>
            <li class="menu-subpages__item"><a class="menu-subpages__link" href="<?php echo get_page_link($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <hr>
<?php endif; ?>
