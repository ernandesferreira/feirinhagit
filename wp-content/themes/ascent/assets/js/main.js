(function($, window){ 

	$('[data-toggle="tooltip"]').tooltip();
	setInterval( function(){
		$('[data-toggle="tooltip"]').tooltip();
	}, 1000);

	$(function(){   
		var nav = $('.login_single');
		var icon = $('.login_single').data('icon');
		console.log(icon);   
		$(window).scroll(function () { 
			if ($(this).scrollTop() > 400) {  
				nav.addClass("menu-fixo");
				$('.menu-fixo a').html('<img src="'+icon+'" alt="icon-logar"/>');
				$('.login_single a.sair').attr('title', 'Sair');
				$('.login_single a.logar').attr('title', 'Logar');  
			} else { 
				nav.removeClass("menu-fixo");
				$('.login_single a.sair').html('Sair');
				$('.login_single a.sair').attr('title', 'Sair');
				$('.login_single a.logar').html('Editar Stand');
				$('.login_single a.logar').attr('title', 'Logar');
			} 
		});  
	});
	

})(jQuery, this);