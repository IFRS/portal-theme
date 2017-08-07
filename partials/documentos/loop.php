<div class="table-responsive">
    <table class="table table-hover table-documentos">
        <thead>
            <tr>
                <th><?php _e('&Uacute;ltima Atualiza&ccedil;&atilde;o'); ?></th>
                <th><?php _e('Documento'); ?></th>
                <th><?php _e('Tipo'); ?></th>
                <th><?php _e('Origem'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php while ( have_posts() ) : the_post(); ?>
            <tr>
                <td><?php the_modified_date('d/m/Y H:i'); ?></td>
                <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
                <td><?php echo get_the_term_list( get_the_ID(), 'documento_type', '', ', ' ); ?></td>
                <td><?php echo get_the_term_list( get_the_ID(), 'documento_origin', '', ', ' ); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
