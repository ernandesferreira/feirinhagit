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

		////// Valores
		var id = $(this).data('id'),
			p = {}, // Propriedades do post (post_title, post_content, etc)
			m = {}; // Metas do post

		// Topo
			m.banner = '',
		// Informações
			p.post_title = $(".infos .texto .titulo").text(),
			p.post_content = $(".infos .texto .descricao").text(),
			m.imagem = '',
		// Galeria
			m.galeria = '',
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

})(jQuery);