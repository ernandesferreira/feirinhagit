<?php 

session_start();

// media
loadMediaUpload();

get_header(); 



global $post, $current_user;

$num_visitas = get_post_meta($post->ID, 'num_visitas', true);

if( !isset($_SESSION['nova_visita_stand']) ){
	update_post_meta($post->ID, 'num_visitas', $num_visitas + 1);
	$num_visitas = get_post_meta($post->ID, 'num_visitas', true);
	$_SESSION['nova_visita_stand'] = time();
}

$banner_id = get_post_meta( $post->ID, 'banner', true );
if( is_numeric($banner_id) ){

	$banner = wp_get_attachment_image_src( $banner_id, 'banner_single_stand' );
	$banner = $banner[0];

} else {

	$banner = get_template_directory_uri().'/assets/images/capa_single.jpg';
}

$categorias = wp_get_post_categories($post->ID);

$nomes_categorias = array();

foreach ($categorias as $categoria) {
	$nomes_categorias[] = get_the_category_by_ID($categoria);
}

$numeros = get_field('numeros');

$dono =  get_post_meta($post->ID, 'dono_stand', true);

if( is_user_logged_in() && ($dono == $current_user->ID || in_array( 'administrator', $current_user->roles ) || in_array( 'editor', $current_user->roles )) ) { ?>
<div class="botoes-edicao">
	<div class="botao botao-editar" title="Editar Página" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-pencil"></i></div>
	<div class="botao botao-salvar" title="Salvar" data-toggle="tooltip" data-id="<?php echo $post->ID; ?>" data-placement="bottom"><i class="fa fa-floppy-o"></i></div>
	<div class="botao botao-cancelar" title="Cancelar" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-times"></i></div>
</div>

<div class="carregando">Carregando...</div>
<div class="carregandoBG"></div>

<?php } ?>


<div class="banner" style="background-image: url(<?php echo $banner; ?>)" newId="<?php echo $banner_id; ?>">
	
	<div class="editar-banner"><i class="fa fa-camera"></i> Trocar Imagem</div>

</div>

<div class="infos">	
	<div class="texto">
		<div class="titulo editable"><?php echo $post->post_title; ?></div>
		<div class="numeros"> Categoria: <?php echo implode(', ',$nomes_categorias); ?> </div>
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
		<div class="descricao editable"><?php echo $post->post_content; ?></div>
	</div>
	<div class="imagem" newId="<?php echo get_post_thumbnail_id( $post->ID ); ?>">
		<div class="login_single" data-icon="<?php echo get_template_directory_uri().'/assets/images/pencil.png'; ?>">
			<?php 
				if( is_user_logged_in() ){
					echo '<a class="sair" href="'.wp_logout_url( get_permalink() ).'" title="Login">Sair</a>';
				}else{
					echo '<a class="logar" href="'.wp_login_url( get_permalink() ).'" title="Login">Editar Stand</a>';
				}
			?>
			
		</div>
		<div class="editar-imagem"><i class="fa fa-camera"></i> Trocar Imagem</div>
		<?php 
			if( get_post_thumbnail_id( $post->ID ) ){
				$imagem = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$imagem = $imagem[0];

				echo '<img src="'.$imagem.'" width="350px" />';
			}else{
				echo '<img src="'.get_template_directory_uri().'/assets/images/stand_imagemaior.jpg'.'" />';
			}
		?>
		
	</div>
	

</div>

<?php if( get_post_meta( $post->ID, 'assinatura_premium', true ) == 1 ){ 


$galeria = get_post_meta( $post->ID, 'galeria', true );

if( $galeria ){

	$imagens_galeria = explode(',', $galeria);
}

?>
<div class="galeria">
	<div class="titulo">Galeria</div>
	<div class="imagens">
		<span class="holder">
		<?php if( is_array($imagens_galeria) ){
			foreach ($imagens_galeria as $imagem_galeria_id) {

				$imagem_galeria_thumb = wp_get_attachment_image_src( $imagem_galeria_id, 'thumb_galeria_single_stand' );
				$imagem_galeria_thumb = $imagem_galeria_thumb[0];

				$imagem_galeria = wp_get_attachment_image_src( $imagem_galeria_id, 'full' );
				$imagem_galeria = $imagem_galeria[0];

		?>

		<div class="img">
			<div class="delete" title="Excluir Imagem" data-toggle="tooltip"><i class="fa fa-times"></i></div>
			<a href="<?php echo $imagem_galeria; ?>" gId="<?php echo $imagem_galeria_id; ?>" class="item_galeria" data-lightbox="galeria">
				<img src="<?php echo $imagem_galeria_thumb; ?>" width="150px" height="150px" />
			</a>
		</div>


		<?php } } ?>
		</span>


		<div class="editar-galeria" title="Adicionar foto" data-toggle="tooltip"><i class="fa fa-plus"></i></div>

	</div>
</div>
<?php } ?>

<div class="contato">
	<div class="titulo">Contato</div>
	<div class="conteudo">
		<div class="item telefone">
			<div class="icone">
				<i class="fa fa-phone"></i>
			</div> 
			<div class="info editable" placeholder="(xx) xxxx-xxxx"><?php echo get_post_meta($post->ID, 'telefone', true); ?></div>
		</div>

		<div class="item telefone2">
			<div class="icone">
				<i class="fa fa-phone"></i>
			</div> 
			<div class="info editable" placeholder="(xx) xxxx-xxxx"><?php echo get_post_meta($post->ID, 'telefone2', true); ?></div>
		</div>

		<div class="item email">
			<div class="icone">
				<i class="fa fa-envelope"></i>
			</div> 
			<div class="info editable" placeholder="Digite seu e-mail de contato"><?php echo get_post_meta($post->ID, 'email', true); ?></div>
		</div>

		<div class="item site">
			<div class="icone">
				<i class="fa fa-globe"></i>
			</div> 
			<div class="info editable" placeholder="Digite o endereço do seu site"><?php echo get_post_meta($post->ID, 'site', true); ?></div>
		</div>
	</div>
</div>


<div class="redes-sociais">
	<div class="conteudo">
		<div class="item facebook" title="Facebook" data-toggle="tooltip">
			<i class="fa fa-facebook"></i>
			<div class="info editable" placeholder="ex: http://facebook.com/minhaPagina"><?php echo get_post_meta($post->ID, 'facebook', true); ?></div>
		</div>
		<div class="item twitter" title="Twitter" data-toggle="tooltip">
			<i class="fa fa-twitter"></i>
			<div class="info editable" placeholder="ex: http://twitter.com/meuPerfil"><?php echo get_post_meta($post->ID, 'twitter', true); ?></div>
		</div>
		<div class="item instagram" title="Instagram" data-toggle="tooltip">
			<i class="fa fa-instagram"></i>
			<div class="info editable" placeholder="ex: http://instagram.com/meuPerfil"><?php echo get_post_meta($post->ID, 'instagram', true); ?></div>
		</div>
		<div class="item google-plus" title="Google Plus" data-toggle="tooltip">
			<i class="fa fa-google-plus"></i>
			<div class="info editable" placeholder="ex: http://gplus.com/meuPerfil"><?php echo get_post_meta($post->ID, 'google_plus', true); ?></div>
		</div>
		<div class="item youtube" title="Youtube" data-toggle="tooltip">
			<i class="fa fa-youtube"></i>
			<div class="info editable" placeholder="ex: http://youtube.com/meuCanal"><?php echo get_post_meta($post->ID, 'youtube', true); ?></div>
		</div>
		<div class="item linkedin" title="Linkedin" data-toggle="tooltip">
			<i class="fa fa-linkedin"></i>
			<div class="info editable" placeholder="ex: http://linkedin.com/meuPerfil"><?php echo get_post_meta($post->ID, 'linkedin', true); ?></div>
		</div>
	</div>
</div>

<div class="visitas">
	<div class="texto">
		Número de visitas <br> <span><?php echo number_format($num_visitas,'0',',','.'); ?></span>
	</div>
</div>


<?php get_footer(); ?>

