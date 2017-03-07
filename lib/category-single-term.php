<?php
// Single Term
$single_term_campus = new Taxonomy_Single_Term( 'category' );
$single_term_campus->set( 'priority', 'default' );
// $single_term_campus->set( 'context', 'normal' );
// $single_term_campus->set( 'metabox_title', __( 'Custom Metabox Title', 'ifrs-portal-theme' ) );
$single_term_campus->set( 'force_selection', true );
$single_term_campus->set( 'indented', true );
$single_term_campus->set( 'allow_new_terms', false );
