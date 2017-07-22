<?php

// Register Custom Post Type - Stands
function cpt_stands() {

	$labels = array(
		'name'                  => _x( 'Stands', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Stand', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Stands', 'text_domain' ),
		'name_admin_bar'        => __( 'Stands', 'text_domain' ),
		'archives'              => __( 'Stands', 'text_domain' ),
		'attributes'            => __( 'Atributos', 'text_domain' ),
		'parent_item_colon'     => __( 'Stand Pai:', 'text_domain' ),
		'all_items'             => __( 'Todos os Stands', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar Novo Stand', 'text_domain' ),
		'add_new'               => __( 'Adicionar Stand', 'text_domain' ),
		'new_item'              => __( 'Novo stand', 'text_domain' ),
		'edit_item'             => __( 'Editar stand', 'text_domain' ),
		'update_item'           => __( 'Atualizar stand', 'text_domain' ),
		'view_item'             => __( 'Ver stand', 'text_domain' ),
		'view_items'            => __( 'Ver stands', 'text_domain' ),
		'search_items'          => __( 'Buscar stand', 'text_domain' ),
		'not_found'             => __( 'Não encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem Destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Selecionar imagem destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagem destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no stand', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Atualizar para este stand', 'text_domain' ),
		'items_list'            => __( 'Lista de stands', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação de lista de stands', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar lista de stands', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Stand', 'text_domain' ),
		'description'           => __( 'Stands', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-store',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'stand', $args );

}
add_action( 'init', 'cpt_stands', 0 );