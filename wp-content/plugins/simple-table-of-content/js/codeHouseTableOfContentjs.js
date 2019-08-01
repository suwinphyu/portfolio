jQuery(document).ready(function($){
	$(document.body).on('click', '.codeHouseTableContent .tocHeading a', function(){
		var link = $(this);
		$(this).closest('p.tocHeading').next('ul.of-toc-list').slideToggle('fast', function(){
			if ($(this).is(':visible')) {
             link.text('Hide Table Of Contents');                
        	} else {
             link.text('Show Table Of Contents');                
        	}    
		});
	});	

	// scroll function  
	$(document.body).on('click', '.codeHouseTableContent ul li a', function(){
		var href = $(this).attr('href');
		$('html, body').animate({
        	scrollTop: $(href).offset().top
    	}, 500);
	});
});