<?php 
	class postPulso{

		function postPulso(){
			add_action('init', array(&$this, 'register_custom_post'));
		}

		function register_custom_post(){
			$labels = array(
				'name'               => __('Pulso'),
				'singural_name'      => __('Pulso'),
				'add_new'            => __('Adicionar Pulso'),
				'add_new_item'       => __('Adicionar novo Pulso'),
				'new_item'           => __('Novo Pulso'),
				'view_item'          => __('Visualizar Pulso'),
				'search_items'       => __('Pesquisar por Pulso'),
				'not_found'          => __('Nenhum Pulso encontrado'),
				'not_found_in_trash' => __('Nada na lixeira'),
				'menu_name'          => __('Pulso')	
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
				'menu_position'      => 4,
				'capability_type'    => 'post',
				'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
				);
			register_post_type('postPulso', $args);
		}
	}// end of class

	$obj = new postPulso();
?>