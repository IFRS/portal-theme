<table class="table table-hover table-editais">
    <thead>
        <tr>
            <th><?php _e('&Uacute;ltima Atualiza&ccedil;&atilde;o'); ?></th>
            <th><?php _e('Edital'); ?></th>
            <th><?php _e('Categorias'); ?></th>
            <th><?php _e('Data'); ?></th>
        </tr>
    </thead>
    <tbody>
    <?php while ( have_posts() ) : the_post(); ?>
        <tr>
            <td><?php the_modified_date(); ?></td>
            <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
            <td><a href="<?php echo get_permalink(); ?>"><?php echo get_the_term_list( get_the_ID(), 'edital_category', '', ', ' ); ?></a></td>
            <td><?php echo rwmb_meta( 'edital_date' ); ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>