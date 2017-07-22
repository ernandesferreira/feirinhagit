(function($, window){ 

	$('[data-toggle="tooltip"]').tooltip();
	setInterval( function(){
		$('[data-toggle="tooltip"]').tooltip();
	}, 1000);


})(jQuery, this);