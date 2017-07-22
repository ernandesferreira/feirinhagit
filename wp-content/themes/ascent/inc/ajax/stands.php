<?php 


add_action('wp_ajax_salvar_stand', 'ajax_salvar_stand');
add_action('wp_ajax_nopriv_salvar_stand', 'ajax_salvar_stand');
function ajax_salvar_stand(){

	$request = (object) $_POST;
	$response = array();

	if( !$request->id ){
		$response['success'] = false;
		$response['error'] = "Stand não identificado!";
	}

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

  	$response['success'] = true;
  	$response['message'] = "Stand editado com sucesso!";

	exit( json_encode($response) );

}