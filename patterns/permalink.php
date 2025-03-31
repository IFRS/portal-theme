<?php
/**
 * Title: Permalink
 * Slug: ifrs/permalink
 * Categories: link
 * Block Types: core/paragraph
 */
?>
<a href="<?php echo esc_url( get_the_permalink() ); ?>" data-type="page"><?php echo get_the_permalink() ?></a>
