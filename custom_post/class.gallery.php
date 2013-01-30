<?php

/**
 * Adicionamos uma acção no inicio do carregamento do WordPress
 * através da função add_action( 'init' )
 */
add_action( 'init', 'create_post_type_gallery' );

/**
 * Esta é a função que é chamada pelo add_action()
 */
function create_post_type_gallery() {

    /**
     * Labels customizados para o tipo de post
     * 
     */
    $labels = array(
	    'name'                 => _x('Galeria de Fotos', 'post type general name'),
	    'singular_name'        => _x('Galeria de Fotos', 'post type singular name'),
	    'add_new'              => _x('Add Nova', 'gallery'),
	    'add_new_item'         => __('Add Nova Galeria'),
	    'edit_item'            => __('Editar Galeria'),
	    'new_item'             => __('Nova Galeria'),
	    'all_items'            => __('Galeria de Fotos'),
	    'view_item'            => __('Vizualizar Galeria'),
	    'search_items'         => __('Pesquisar por Galeria'),
	    'not_found'            => __('Nenhum Galeria encontrada'),
	    'not_found_in_trash'   => __('Nenhum Galeria encontrada na lixeira'),
	    'parent_item_colon'    => '',
	    'menu_name'            => 'Galeria de Fotos'
    );
    
    /**
     * Registamos o tipo de post gallery através desta função
     * passando-lhe os labels e parâmetros de controlo.
     */
    register_post_type( 'gallery', array(
	    'labels'               => $labels,
	    'public'               => true,
	    'publicly_queryable'   => true,
	    'show_ui'              => true,
	    'show_in_menu'         => true,
	    'has_archive'          => 'gallery',
	    'rewrite'              => array('slug' 
	    	                   => 'gallery','with_front' 
	    	                   => false,),
	    'capability_type'      => 'post',
	    'has_archive'          => true,
	    'hierarchical'         => false,
	    'menu_position'        => 6,
	    'supports'             => array('title','editor','author','thumbnail','excerpt','comments')
	    )
    );
    
    /**
     * Registamos a categoria de gallery para o tipo de post gallery
     */
    register_taxonomy( 'gallery_category', array( 'gallery' ), array(
        'hierarchical'         => true,
        'label'                => __( 'Galeria Category' ),
        'labels'               => array( // Labels customizadas
	    'name'                 => _x( 'Categories', 'taxonomy general name' ),
	    'singular_name'        => _x( 'Category', 'taxonomy singular name' ),
	    'search_items'         => __( 'Search Categories' ),
	    'all_items'            => __( 'All Categories' ),
	    'parent_item'          => __( 'Parent Category' ),
	    'parent_item_colon'    => __( 'Parent Category:' ),
	    'edit_item'            => __( 'Edit Category' ),
	    'update_item'          => __( 'Update Category' ),
	    'add_new_item'         => __( 'Add New Category' ),
	    'new_item_name'        => __( 'New Category Name' ),
	    'menu_name'            => __( 'Album' ),
	),
        'show_ui'              => true,
        'show_in_tag_cloud'    => true,
        'query_var'            => true,
        'rewrite'              => array('slug'
                               => 'gallery/categories','with_front' 
                               => false,),
        )
    );
    
    /** 
     * Esta função associa tipos de categorias com tipos de posts.
     * Aqui associamos as tags ao tipo de post gallery.
     */
    register_taxonomy_for_object_type( 'tags', 'gallery' );
    
}
