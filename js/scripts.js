(function(){

	if( $(window).width() >= 768 ){ // Tablet/Desktop

		// Scroll Spy
		$('#navHeader').scrollspy({
			// min: $('#navHeader').offset().top,
				min:$("body").offset().top+($('header').height() - $('#navHeader').innerHeight() ),
				max:$("body").offset().top+10000,
			onEnter: function(element, position) {
				$('#navHeader').addClass('navFixed').addClass('navShadow');
				$('header').css('paddingBottom', '60px');
			},
			onLeave: function(element, position) {
				$('#navHeader').removeClass('navFixed').removeClass('navShadow');
				$('header').css('paddingBottom', '0px');
			}
		});

		var detailScroll = '510';

	} else { // Smartphone

		// Menu
		$('#menu').on('click', function(){
			$('.navMain #navWrap').slideToggle('fast');
			return false;
		});
		$('.navMain #navWrap a').on('click', function(){ $('.navMain #navWrap').slideToggle('fast'); });

		var detailScroll = '200';
	}

	// Scroll to Project Details
	if(window.location.hash == "#projectDetails"){ $('html,body').animate({ scrollTop: detailScroll }, 1); }

	// Smooth Scroll
	$('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	           if (target.length) {
	             $('html,body').animate({
	                 scrollTop: target.offset().top - 60 // 50 Set Offset
	            }, 800);
	            return false;
	        }
	    }
	});

	// Contact Form
	$('#submitForm').on('click', function(){
		var name = $("#name").val(),
			email = $("#email").val(),
			message = $("#message").val(),
			dataString = 'name='+ name + '&email=' + email + '&message=' + message; 
		// Validate
		$('input, textarea').removeClass('formError');
	    if( name == '' ){ $('#name').focus().addClass('formError'); return false; }
	    if( email == '' ){ $('#email').focus().addClass('formError'); return false; }
	    if( message == '' ){ $('#message').focus().addClass('formError'); return false; }
	    // Process
		$.ajax({  
			type: "POST",  
			url: "email.php",  
			data: dataString,  
			success: function(r) {  
				$('#contactForm').html(r);
			}  
		});  
		return false;
	});

})();