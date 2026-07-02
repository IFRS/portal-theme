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

$collapseID = wp_unique_id('subpages-collapse-');
?>

<?php if (count($children) > 0) : ?>
  <nav class="subpages">
    <button class="btn subpages__toggle" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapseID; ?>" aria-expanded="false" aria-controls="<?php echo $collapseID; ?>">
      Menu da P&aacute;gina
    </button>
    <ul class="collapse show subpages__menu" id="<?php echo $collapseID; ?>">
    <?php if ($parent) : ?>
      <li class="subpages__item subpages__item--parent">
        <a class="subpages__link" href="<?php echo esc_url(get_page_link($parent)); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="14" height="14" fill="currentColor"><!--!Font Awesome Free v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M32 448c-17.7 0-32 14.3-32 32s14.3 32 32 32l96 0c53 0 96-43 96-96l0-306.7 73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 109.3 160 416c0 17.7-14.3 32-32 32l-96 0z"/></svg>
          <?php echo esc_html(get_the_title($parent)); ?>
        </a>
      </li>
    <?php endif; ?>
    <?php foreach ($children as $child): ?>
      <li class="subpages__item">
        <a class="subpages__link" href="<?php echo esc_url(get_page_link($child->ID)); ?>"><?php echo esc_html($child->post_title); ?></a>
      </li>
    <?php endforeach; ?>
    </ul>
  </nav>
<?php endif; ?>
