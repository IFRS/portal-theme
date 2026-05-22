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
  <ul class="nav subpages">
  <?php if ($parent) : ?>
    <li class="nav-item nav-item--parent">
      <a class="nav-link" href="<?php echo get_page_link($parent); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 640 640" fill="currentColor" class="me-1"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M160 512C142.3 512 128 526.3 128 544C128 561.7 142.3 576 160 576L256 576C309 576 352 533 352 480L352 173.3L425.4 246.7C437.9 259.2 458.2 259.2 470.7 246.7C483.2 234.2 483.2 213.9 470.7 201.4L342.7 73.4C330.2 60.9 309.9 60.9 297.4 73.4L169.4 201.4C156.9 213.9 156.9 234.2 169.4 246.7C181.9 259.2 202.2 259.2 214.7 246.7L288 173.3L288 480C288 497.7 273.7 512 256 512L160 512z"/></svg>
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
