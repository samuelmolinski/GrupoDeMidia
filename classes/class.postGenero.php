<?php 
	class postGenero{

		function postGenero(){
			add_action('init', array(&$this, 'register'));
		}

		function register(){
			$this->registerGeneros();
		}

		function registerGeneros(){
			$lables = array(
				'name'              => __('Genero'),
				'singular_name'     => __('Genero'),
				'search_items'      => __('Pesquisar Genero'),
				'popular_items'     => __('Mais usados'),
				'all_items'         => __('Todos os Genero'),
				'parent_item'       => NULL,
				'parent_item_colon' => NULL,
				'edit_item'         => __('Editar'),
				'update_item'       => __('Atualizar'),
				'add_new_item'      => __('Adicionar novo Genero'),
				'menu_name'         => __('Genero')
				);
			$args = array(
				'hierarchical'      => TRUE,
				'labels'            => $labels,
				'singular_label'    => 'Genero',
				'all_items'         => 'Todos os Genero',
				'show_ui'           => TRUE,
				'query_var'         => TRUE,
				'rewrite'           => array('slug' => 'genero')
				);
			register_taxonomy('postGenero', '', $args);
		}
	}
	$obj = new postGenero();
?>