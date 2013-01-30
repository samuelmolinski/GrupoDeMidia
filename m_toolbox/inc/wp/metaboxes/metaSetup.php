<?php

require_once('MetaBox.php');
require_once('MediaAccess.php');

// global styles for the meta boxes
if (is_admin()) wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/library/css/metaboxes.css');


$mb_curso = new WPAlchemy_MetaBox(array
(
	'id' => 'curso-customMeta',
	'title' => 'Curso',
	'types' => array('curso'), // added only for pages and to custom post type "events"
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => METAPATH . 'meta/curso-meta.php'
));

$mb_gallery = new WPAlchemy_MetaBox(array
(
	'id' => 'proposta-customMeta',
	'title' => 'Album',
	'types' => array('albums'), // added only for pages and to custom post type "events"
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => METAPATH . 'meta/album-meta.php'
));

/* eof */