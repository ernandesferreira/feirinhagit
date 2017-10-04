<?php 


get_header(); 




?>

<div class="row">

	<div class="stands">
		
	    <?php 

	    	if ( have_posts() ){

	    		while ( have_posts() ){ the_post();

	    			$categorias = wp_get_post_categories($post->ID);

					$nomes_categorias = array();
					$numeros = get_field('numeros', $post->ID);

					foreach ($categorias as $categoria) {
						$nomes_categorias[] = get_the_category_by_ID($categoria);
					}

					$numeros = get_field('numeros', $post->ID);

	    			//echo "<pre>" . print_r($post, true) . "</pre>";
	     ?>
	     	<div class="stand">
	     		<div class="image">
	     			<a href="<?php echo get_post_permalink($post->ID); ?>">
	     			<?php 
						if( get_post_thumbnail_id( $post->ID ) ){
							$imagem = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb_galeria_single_stand' );
							$imagem = $imagem[0];

							$imagem_post = get_the_post_thumbnail( $post->ID, array( 150, 150), array( 'class' => 'img-responsive' ) );

							echo $imagem_post;
						}else{
							echo '<img src="'.get_template_directory_uri().'/assets/images/stand_image.jpg'.'" />';
						}
					?>
					</a>
	     		</div>
	     		<div class="info">
		     		<a href="<?php echo get_post_permalink($post->ID); ?>"><div class="nome"><?php echo $post->post_title; ?></div></a>
		     		<div class="categorias">Categoria: <?php echo implode(', ',$nomes_categorias); ?></div>
		     				<?php if (is_array($numeros)){ 
								asort($numeros);
							?>
							<div class="numeros">
							Stands: 
								<?php foreach ($numeros as $numero) { ?>

								<div class="numero"><?php echo $numero['numero']; ?></div>

								<?php } ?>
							</div>
							<?php } ?>
							<?php
								$localizacao_stand = get_field('localizacao_stand');
								//echo '<pre>' . print_r($localizacao_stand, true) . '</pre>';
								if($localizacao_stand){
									echo '<div class="numeros">
													Localização: '.$localizacao_stand.'
												</div>';
								}
							?>
		     		
		     	</div>
		     	<div class="botao_verStand">
		     		<a href="<?php echo get_post_permalink($post->ID); ?>" class="link"><button type="button" class="btn btn-success"> Ver Stand </button></a>
		     	</div>
	     	</div>


	     <?php }  
	     wp_pagenavi();
	 		}

	     ?>
	</div>

</div>




<?php get_footer(); ?>