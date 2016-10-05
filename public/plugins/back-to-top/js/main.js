jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 80,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 700,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//var n =  $(document).height() - $(window).height();
	var n = $('body').outerHeight() - $(window).height();

	//hide or show the "back to top" link
	//$back_to_top.addClass('cd-is-visible');
	$(window).scroll(function(){
		$('#posi_result').html(n + ' : ' + $(this).scrollTop());
		( $(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		( $(this).scrollTop() > offset_opacity ) ? $back_to_top.addClass('cd-fade-out') : $back_to_top.removeClass('cd-fade-out');

		if($(this).scrollTop() < n && $(this).scrollTop() >= n - offset -500){
			$back_to_top.css("background-image", "url(/newportal/plugins/back-to-top/img/up-arrow.svg)");
			$back_to_top.data('goto',"top");
		}else{
			$back_to_top.css("background-image", "url(/newportal/plugins/back-to-top/img/down-arrow.svg)");
			$back_to_top.data('goto',"bottom");
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		
		event.preventDefault();
		if($(this).data('goto') == 'bottom'){
			$('body,html').animate({
				scrollTop: n ,
		 		}, scroll_top_duration
			);

		}else{
			$('body,html').animate({
				scrollTop: 0 ,
		 		}, scroll_top_duration
			);
		}
		
	});

});