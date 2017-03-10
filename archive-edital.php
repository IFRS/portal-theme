<?php get_header(); ?>

<div class="row">
    <div class="col-xs-12 col-md-10">
        <div class="content">
            <h2 class="title">Editais</h2>
            <?php if (have_posts()) : ?>
                <table class="table table-striped table-editais">
                    <thead>
                        <tr>
                            <th>&Uacute;ltima Atualiza&ccedil;&atilde;o</th>
                            <th>Edital</th>
                            <th>Categorias</th>
                            <th>Data</th>
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
            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    <p><strong>Aguarde!</strong> Em breve os editais ser&atilde;o publicados.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">

    </div>
</div>

<?php get_footer(); ?>
