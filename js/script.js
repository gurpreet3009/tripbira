
		$(window).scroll(function(){
			var scroll = $(window).scrollTop();
			if (scroll > 100) {
				$(".logo").attr("src" , "images/Logo1.png");
				$(".menu a").css('color','#222');	
				$('.menu > ul > li > ul').css('background','#fff');
				$('.menu > ul > li').hover(function(){$(this).css('background','#fff');})	
			}
 
			else{
				$(".logo").attr("src" , "images/Logo.png");
				$(".menu a").css('color','#fff');  	
				$('.menu > ul > li > ul').css('background','#10232f');
				$('.menu > ul > li').hover(function(){$(this).css('background','#10232f');})
			}
		})

	 	function scrollToDownload() {
	 		if ($('.section-download').length != 0) {
	 			$("html, body").animate({
	 				scrollTop: $('.section-download').offset().top
	 			}, 1000);
	 		}
	 	}

	 	var swiper = new Swiper('.swiper-container', {
			effect: 'coverflow',
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: 'auto',
			initialSlide: 9,
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows : true,
			},
			pagination: {
				el: '.swiper-pagination',
			},
		});

		$('.slid_singapore').click(function(){
			$('#sing_sub').click();
		})

			function goBack() {
			  window.history.back();
			}

			$('ul.nav-pills li a').click(function (e) {
				$('ul.nav-pills li.active').removeClass('active')
				$(this).parent('li').addClass('active')
			})

		$(document).ready(function(){
			new WOW().init();
		})