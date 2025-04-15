<?php
add_action( 'rss2_item', function() {
	if (!has_post_thumbnail(get_the_ID())) return;

	$thumbnail_id = get_post_thumbnail_id(get_the_ID());
    $thumbnail_file = get_attached_file($thumbnail_id);

	if (empty($thumbnail_file)) return;

	$upload_dir = wp_upload_dir();

	printf(
		'<enclosure url="%s" length="%s" type="%s" />',
		get_the_post_thumbnail_url(get_the_ID()),
		filesize($thumbnail_file),
		get_post_mime_type($thumbnail_id)
	);
} );
