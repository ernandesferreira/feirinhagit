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

					foreach ($categorias as $categoria) {
						$nomes_categorias[] = get_the_category_by_ID($categoria);
					}

					$numeros = get_field('numeros');

	    			//echo "<pre>" . print_r($post, true) . "</pre>";
	     ?>

	     	<div class="stand">
	     		<div class="image">
	     			<a href="<?php echo get_post_permalink($post->ID); ?>">
	     			<?php 
						if( get_post_thumbnail_id( $post->ID ) ){
							$imagem = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb_galeria_single_stand' );
							$imagem = $imagem[0];

							echo '<img src="'.$imagem.'" width="150px" />';
						}else{
							echo '<img src="http://via.placeholder.com/150x150" />';
						}
					?>
					</a>
	     		</div>
	     		<div class="info">
		     		<div class="nome"><?php echo $post->post_title; ?></div>
		     		<div class="categorias">Categoria: <?php echo implode(', ',$nomes_categorias); ?></div>
		     		<div class="numeros">
		     			Stands: 
						<?php foreach ($numeros as $numero) { ?>

						<div class="numero"><?php echo $numero['numero']; ?></div>

						<?php } ?>
		     		</div>
		     		<a href="<?php echo get_post_permalink($post->ID); ?>" class="link">Ver Stand</a>
		     	</div>
	     	</div>


	     <?php }  
	 		}

	     ?>
	</div>

</div>




<?php get_footer(); ?>