<?php
add_action( 'rss2_item', function() {
	if (!has_post_thumbnail(get_the_ID())) return;

	$thumbnail_id = get_post_thumbnail_id(get_the_ID());
    $thumbnail_file = get_attached_file($thumbnail_id);

	if (empty($thumbnail_file)) return;

	if (!is_readable($thumbnail_file)) return;

	$thumbnail_size = filesize($thumbnail_file);
	if ($thumbnail_size === false) return;

	printf(
		'<enclosure url="%s" length="%s" type="%s" />',
		esc_url(get_the_post_thumbnail_url(get_the_ID())),
		(int) $thumbnail_size,
		esc_attr(get_post_mime_type($thumbnail_id))
	);
} );
