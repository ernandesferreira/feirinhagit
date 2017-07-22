<?php get_header(); 

	global $post;

	$banner = get_template_directory_uri().'/assets/images/banner_stand.jpg';

?>

<div class="botoes-edicao">
	<div class="botao botao-editar" title="Editar Página" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-pencil"></i></div>
	<div class="botao botao-salvar" title="Salvar" data-toggle="tooltip" data-id="<?php echo $post->ID; ?>" data-placement="bottom"><i class="fa fa-floppy-o"></i></div>
	<div class="botao botao-cancelar" title="Cancelar" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-times"></i></div>
</div>

<div class="banner" style="background-image: url(<?php echo $banner; ?>)">
	
	<div class="editar-banner"><i class="fa fa-camera"></i> Trocar Imagem</div>

</div>

<div class="infos">
	
	<div class="texto">
		<div class="titulo editable"><?php echo $post->post_title; ?></div>
		<div class="numeros"> Categoria: Moda Infantil </div>
		<div class="numeros">
		Stands: 
			<div class="numero">253</div>
			<div class="numero">254</div>
		</div>
		<div class="descricao editable"><?php echo $post->post_content; ?></div>
	</div>
	<div class="imagem">
		<div class="editar-imagem"><i class="fa fa-camera"></i> Trocar Imagem</div>
		<?php 
			if( get_post_thumbnail_id( $post->ID ) ){
				remove_action( 'begin_fetch_post_thumbnail_html', '_wp_post_thumbnail_class_filter_add' );
				echo get_the_post_thumbnail( $post->ID, array( 350, 320));
			}else{
				echo '<img src="http://via.placeholder.com/350x320" />';
			}
		?>
	</div>

</div>

<div class="galeria">
	<div class="titulo">Galeria</div>
	<div class="imagens">
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />
		<img src="http://via.placeholder.com/150x150" />

		<div class="editar-galeria" title="Adicionar foto" data-toggle="tooltip"><i class="fa fa-plus"></i></div>

	</div>
</div>

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
		Número de visitas <br> <span>573</span>
	</div>
</div>


<?php get_footer(); ?>