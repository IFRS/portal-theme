<?php
    $children = get_pages(
        array(
            'child_of' => get_the_ID(),
            'parent'   => get_the_ID()
        )
    );
    $parent = wp_get_post_parent_id( get_the_ID() );
?>
<?php if (count($children) > 0) : ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only"><?php _e('Alternar navega&ccedil;&atilde;o') ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Brand</a> -->
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php foreach ($children as $child): ?>
                    <li><a href="<?php echo get_page_link($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
                <?php endforeach; ?>
                </ul>
                <?php if ($parent) : ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo get_page_link($parent); ?>"><span class="glyphicon glyphicon-arrow-up"></span></a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
<?php else : ?>
    <hr>
<?php endif; ?>
