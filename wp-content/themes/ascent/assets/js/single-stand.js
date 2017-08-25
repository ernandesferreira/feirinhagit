(function($){ 

	$(document).on('ready', function(){
		$('.item:has(.info:empty)').hide();

	});

	// Editar
	$(document).on('click', '.botoes-edicao .botao-editar', function(){

		$('body').addClass('editing');
		$('.editable').attr('contentEditable', true);
		$('.item:has(.info:empty)').show();

		$('.botoes-edicao .botao').animate({'width':'10px', 'height':'10px', 'font-size':'5px', 'opacity': '0'},300, function(){

			$('.botao-editar').hide();
			$('.botao-salvar, .botao-cancelar').css({'display':'inline-block'});

			$('.botoes-edicao .botao').animate({'width':'60px', 'height':'60px', 'font-size':'25px', 'opacity': '1'},500, function(){
				$('.botao-salvar, .botao-cancelar').attr('style',false);
				$('.botao-salvar, .botao-cancelar').css({'display':'inline-block'});
			});
		});

	});

	// Cancelar
	$(document).on('click', '.botoes-edicao .botao-cancelar', function(){

		$('.botoes-edicao .botao').animate({'width':'10px', 'height':'10px', 'font-size':'5px', 'opacity': '0'},300, function(){

			$('.botao-salvar, .botao-cancelar').hide();
			$('.botao-editar').css({'display':'inline-block'});

			$('.carregando, .carregandoBG').fadeIn(500);
			location.reload();

		});
	});

	// Salvar
	$(document).on('click', '.botoes-edicao .botao-salvar', function(){

		// Animação
		$('.botoes-edicao .botao').animate({'width':'10px', 'height':'10px', 'font-size':'5px', 'opacity': '0'},300, function(){
			$('.botao-salvar, .botao-cancelar').hide();
			$('.botao-editar').css({'display':'inline-block'});

			$('.carregando, .carregandoBG').fadeIn(500);
		});

		images = [];
		
		$('.item_galeria').each( function(){
			images.push( $(this).attr('gId') );
		});

		////// Valores
		var id = $(this).data('id'),
			p = {}, // Propriedades do post (post_title, post_content, etc)
			m = {}; // Metas do post

		// Topo
			m.banner = $(".banner").attr('newId'),
		// Informações
			p.post_title = $(".infos .texto .titulo").text(),
			p.post_content = $(".infos .texto .descricao").text(),
			m._thumbnail_id = $(".infos .imagem").attr('newId'),
		// Galeria
			m.galeria = images.join(),
		// Contato
			m.telefone = $(".contato .conteudo .telefone .info").text(),
			m.telefone2 = $(".contato .conteudo .telefone2 .info").text(),
			m.email = $(".contato .conteudo .email .info").text(),
			m.site = $(".contato .conteudo .site .info").text(),
		// Rede Social
			m.facebook = $(".redes-sociais .conteudo .facebook .info").text(),
			m.twitter = $(".redes-sociais .conteudo .twitter .info").text(),
			m.instagram = $(".redes-sociais .conteudo .instagram .info").text(),
			m.google_plus = $(".redes-sociais .conteudo .google-plus .info").text(),
			m.youtube = $(".redes-sociais .conteudo .youtube .info").text(),
			m.linkedin = $(".redes-sociais .conteudo .linkedin .info").text();

		$.ajax({
			'url': ajaxurl,
			'type':'post',
			'dataType': 'json',
			'data':{
				'action':'salvar_stand',
				'id':id,
				'p':p,
				'm':m
			},
			success:function(response){

				if( typeof(response.error) !== "undefined" ){
					alert(response.error);
				}

				location.reload();
			},
			error:function(error){
				console.error(error);
				$('.carregando, .carregandoBG').hide();
				alert(error);
			}
		});

	});




	$(document).ready(function() {

		function saveCropData(elemnt,data){
			jQuery('.crop_data').val( JSON.stringify(data) );
		}

		// Uploading files
		var file_frame;
		var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
		var set_to_post_id = 1; // Set this

		jQuery('.editar-banner').on('click', function( event ){
			event.preventDefault();

			// If the media frame already exists, reopen it.
			if ( file_frame != undefined && file_frame ) {
				file_frame.open();
				return;
			}
		 
			// Create the media frame.
			file_frame = wp.media.frames.file_frame = wp.media({
				title: jQuery( this ).data( 'uploader_title' ),
				button: {
					text: jQuery( this ).data( 'uploader_button_text' ),
				},
				multiple: false  // Set to true to allow multiple files to be selected
			});
		 
			// When an image is selected, run a callback.
			file_frame.on( 'select', function() {
				// We set multiple to false so only get one image from the uploader
				attachment = file_frame.state().get('selection').first().toJSON();

				url = (typeof(attachment.sizes.banner_single_stand) !== 'undefined' ? attachment.sizes.banner_single_stand.url : attachment.url );

				$('.banner').css({'background-image': 'url(' + url + ')'}).attr('newId',attachment.id);

			});
		 
			// Finally, open the modal
			file_frame.open();
		});


		jQuery('.infos .imagem .editar-imagem').on('click', function( event ){
			event.preventDefault();

			// If the media frame already exists, reopen it.
			if ( file_frame != undefined && file_frame ) {
				file_frame.open();
				return;
			}
		 
			// Create the media frame.
			file_frame = wp.media.frames.file_frame = wp.media({
				title: jQuery( this ).data( 'uploader_title' ),
				button: {
					text: jQuery( this ).data( 'uploader_button_text' ),
				},
				multiple: false  // Set to true to allow multiple files to be selected
			});
		 
			// When an image is selected, run a callback.
			file_frame.on( 'select', function() {
				// We set multiple to false so only get one image from the uploader
				attachment = file_frame.state().get('selection').first().toJSON();

				console.log(attachment);

				$('.infos .imagem').attr('newId',attachment.id);

				$('.infos .imagem img').attr('src', attachment.url)

			});
		 
			// Finally, open the modal
			file_frame.open();
		});

		jQuery('.editar-galeria').on('click', function( event ){
			event.preventDefault();

			// If the media frame already exists, reopen it.
			if ( file_frame != undefined && file_frame ) {
				file_frame.open();
				return;
			}
		 
			// Create the media frame.
			file_frame = wp.media.frames.file_frame = wp.media({
				title: jQuery( this ).data( 'uploader_title' ),
				button: {
					text: jQuery( this ).data( 'uploader_button_text' ),
				},
				multiple: true  // Set to true to allow multiple files to be selected
			});
		 
			// When an image is selected, run a callback.
			file_frame.on( 'select', function() {
				// We set multiple to false so only get one image from the uploader
				attachments = file_frame.state().get('selection').toJSON();

				$.each( attachments, function(key,attachment){

					thumb = (typeof(attachment.sizes.thumb_galeria_single_stand) !== 'undefined' ? attachment.sizes.thumb_galeria_single_stand.url : attachment.url );

					$('.galeria .imagens .holder').append(	'<div class="img">'+
																'<div class="delete" title="Excluir Imagem" data-toggle="tooltip"><i class="fa fa-times"></i></div>'+
																'<a href="'+attachment.url+'" gId="'+attachment.id+'" class="item_galeria" data-lightbox="galeria">'+
																	'<img src="'+thumb+'" width="150px" height="150px" />'+
																'</a>'+
															'</div>');

				});

			});
		 
			// Finally, open the modal
			file_frame.open();
		});

		$(document).on('click', '.galeria .imagens .holder .delete', function(){
			$(this).parent('.img').remove();
		});


		// Restore the main ID when the add media button is pressed
		jQuery('a.add_media').on('click', function() {
			wp.media.model.settings.post.id = wp_media_post_id;
		});
	});

})(jQuery);
