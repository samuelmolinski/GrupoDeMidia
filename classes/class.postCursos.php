<?php 
	class postCursos{

		function postCursos(){
			add_action('init', array(&$this, 'register_custom_post'));
		}

		function register_custom_post(){
			$labels = array(
				'name'               => __('Cursos e Eventos'),
				'singural_name'      => __('Cursos e Eventos'),
				'add_new'            => __('Adicionar Cursos e Eventos'),
				'add_new_item'       => __('Adicionar novos Cursos e Eventos'),
				'new_item'           => __('Novo'),
				'view_item'          => __('Visualizar Cursos e Eventos'),
				'search_items'       => __('Pesquisar por Cursos e Eventos'),
				'not_found'          => __('Nenhuma notícia encontrada'),
				'not_found_in_trash' => __('Nada na lixeira'),
				'menu_name'          => __('Cursos e Eventos')	
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
				'menu_position'      => 6,
				'capability_type'    => 'post',
				'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
				);
			register_post_type('postCursos', $args);
		}
	}// end of class

	$obj = new postCursos();
?>