<?php 
	class postNoticia{

		function postNoticia(){
			add_action('init', array(&$this, 'register_custom_post'));
		}

		function register_custom_post(){
			$labels = array(
				'name'               => __('Notícia'),
				'singural_name'      => __('Notícia'),
				'add_new'            => __('Adicionar Notícia'),
				'add_new_item'       => __('Adicionar nova Notícia'),
				'new_item'           => __('Nova Notícia'),
				'view_item'          => __('Visualizar Notícia'),
				'search_items'       => __('Pesquisar Notícia'),
				'not_found'          => __('Nenhuma notícia encontrada'),
				'not_found_in_trash' => __('Nada na lixeira'),
				'menu_name'          => __('Notícia')	
				);
			$args = array(
				'labels'             => $labels,
				'description'        => __('Descrição'),
				'public'             => TRUE,
				'publicly_queryable' => true,
				'show_ui'            => TRUE,
				'query_var'          => TRUE,
				'show_in_menu'       => TRUE,
				'taxonomies'         => array('postCategoria'),
				'hierarchical'       => FALSE,
				'menu_position'      => 5,
				'capability_type'    => 'post',
				'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
				);
			register_post_type('postNoticia', $args);
		}
	}// end of class

	$obj = new postNoticia();
?>