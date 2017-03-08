<?php
// Single Term
$single_term_category = new Taxonomy_Single_Term( 'category' );
$single_term_category->set( 'priority', 'high' );
// $single_term_category->set( 'context', 'normal' );
$single_term_category->set( 'metabox_title', __( 'Cartola', 'ifrs-portal-theme' ) );
$single_term_category->set( 'force_selection', true );
$single_term_category->set( 'indented', true );
$single_term_category->set( 'allow_new_terms', false );
