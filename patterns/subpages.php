<?php
/**
 * Title: Subpáginas
 * Slug: ifrs/subpages
 * Categories: list
 * Block Types:
 */

$ID = get_the_ID();

$option = get_post_meta($ID, '_page_subpages', true);

$children = get_pages(
  array(
    'sort_column' => 'menu_order',
    'parent' => $ID,
  )
);
$parent = wp_get_post_parent_id( $ID );
$ancestors = get_post_ancestors( $ID );
$depth = count($ancestors);
?>

<?php if (count($children) > 0) : ?>
  <ul class="nav flex-column subpages">
  <?php if ($parent) : ?>
    <li class="nav-item border-bottom">
      <a class="nav-link" href="<?php echo get_page_link($parent); ?>">
        <!-- <i class="fa-solid fa-chevron-left me-1"></i> -->
        <i class="fa-solid fa-arrow-turn-up me-1"></i>
        <?php echo get_the_title($parent); ?>
      </a>
    </li>
  <?php endif; ?>
  <?php foreach ($children as $child): ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo get_page_link($child->ID); ?>"><?php echo $child->post_title; ?></a>
    </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
