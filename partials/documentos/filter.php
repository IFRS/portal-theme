<h3 class="text-center"><?php _e('Filtros'); ?></h3>

<div id="documento-filter-accordion">
    <div class="card card-body">
        <div class="btn-group d-flex" role="group" aria-label="Filtros">
            <a id="toggleYearly" class="btn btn-primary" role="button" data-toggle="collapse" data-parent="#documento-filter-accordion" href="#collapseYearly" aria-expanded="true" aria-controls="collapseYearly">
                <?php _e('por Ano'); ?>
            </a>
            <a id="toggleMonthly" class="btn btn-primary" role="button" data-toggle="collapse" data-parent="#documento-filter-accordion" href="#collapseMonthly" aria-expanded="true" aria-controls="collapseMonthly">
                <?php _e('por M&ecirc;s'); ?>
            </a>
        </div>
        <div id="collapseYearly" class="collapse<?php if (is_year()) echo ' in'; ?>" role="tabpanel" aria-labelledby="toggleYearly">
            <ul class="side-list">
            <?php
                wp_get_archives(array(
                    'type'      => 'yearly',
                    'order'     => 'DESC',
                    'post_type' => 'documento'
                ));
            ?>
            </ul>
        </div>
        <div id="collapseMonthly" class="collapse<?php if (is_month()) echo ' in'; ?>" role="tabpanel" aria-labelledby="toggleMonthly">
            <ul class="side-list">
            <?php
                wp_get_archives(array(
                    'type'      => 'monthly',
                    'order'     => 'DESC',
                    'post_type' => 'documento'
                ));
            ?>
            </ul>
        </div>
    </div>
</div>
