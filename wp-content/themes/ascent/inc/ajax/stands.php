<?php 


add_action('wp_ajax_salvar_stand', 'ajax_salvar_stand');
function ajax_salvar_stand(){

	global $current_user;

	$request = (object) $_POST;
	$response = array();

	$response['success'] = true;


	if( !$request->id ){
		$response['success'] = false;
		$response['error'] = "Stand não identificado!";
	}

	$dono =  get_post_meta($request->ID, 'dono_stand', true);

	if( $dono != $current_user->ID && !in_array( 'administrator', $current_user->roles ) ) {

		$response['success'] = false;
		$response['error'] = "Você não tem permissão para editar este stand!";
	}

	if( $response['success'] == true ){

		// Post
		$post = array(
			'ID'	=> $request->id
	  	);

	  	if(is_array($request->p)){
	  		foreach ($request->p as $key => $value) {
	  			$post[$key] = $value;
	  		}
	  	}

		$update = wp_update_post( $post );

		// Meta
		if(is_array($request->m)){
	  		foreach ($request->m as $meta_key => $meta_value) {
	  			update_post_meta( $request->id, $meta_key, $meta_value );
	  		}
	  	}

	  	$response['message'] = "Stand editado com sucesso!";
	}

	exit( json_encode($response) );

}