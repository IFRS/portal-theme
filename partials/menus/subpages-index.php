<?php
    $children = get_pages(
        array(
            'sort_column' => 'menu_order',
            'child_of' => get_the_ID(),
            'parent' => get_the_ID()
        )
    );
    $parent = wp_get_post_parent_id( get_the_ID() );
    $ancestors = get_post_ancestors($post->ID);
    $depth = count($ancestors);
?>
<?php if ($children && count($children) > 0) : ?>
    <ul class="nav flex-column">
        <?php if ($parent && $depth >= 3) : ?>
            <li class="nav-item"><a class="nav-link d-inline-block" href="<?php echo get_page_link($parent); ?>">Subir ao n&iacute;vel anterior</a></li>
        <?php endif; ?>
        <?php foreach ($children as $child): ?>
            <li class="nav-item"><a class="nav-link d-inline-block" href="<?php echo get_page_link($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <hr class="page__separator">
<?php endif; ?>
