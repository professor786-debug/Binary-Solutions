/*
Author       : Themesvila
Template Name: Edutec
Version      : 1.0
*/


(function($) {
	'use strict';

		/*PRELOADER JS*/		
		$(window).on('load', function() { 
			$('.preloader').fadeOut();
			$('.preloader').delay(350).fadeOut('slow'); 
		}); 
				
		/*END PRELOADER JS*/
		
		jQuery(document).ready(function($) {
						
			//Mobile Menu Js Start //
			$("#main-menu").meanmenu({
				meanMenuContainer: ".mobile-menu",
				meanScreenWidth: "1199",
				meanExpand: ['<i class="far fa-plus"></i>'],
			});

			// Sidebar Toggle Js Start //
			$(".offcanvas__close,.offcanvas__overlay").on("click", function () {
				$(".offcanvas__info").removeClass("info-open");
				$(".offcanvas__overlay").removeClass("overlay-open");
			});
			$(".sidebar__toggle").on("click", function () {
				$(".offcanvas__info").addClass("info-open");
				$(".offcanvas__overlay").addClass("overlay-open");
			});

			// Body Overlay Js Start //
			$(".body-overlay").on("click", function () {
				$(".offcanvas__area").removeClass("offcanvas-opened");
				$(".df-search-area").removeClass("opened");
				$(".body-overlay").removeClass("opened");
			});

			/*Counter */
			$('.counter-item').on('inview', function(event, visible, visiblePartX, visiblePartY) {
				if (visible) {
					$(this).find('.count').each(function () {
						var $this = $(this);
						$({ Counter: 0 }).animate({ Counter: $this.text() }, {
							duration: 2000,
							easing: 'swing',
							step: function () {
								$this.text(Math.ceil(this.Counter));
							}
						});
					});
					$(this).unbind('inview');
				}
			});	
			
						
		});
		

		/*START Mini Cart JS*/

		$('.mcart_icon').on('click', function(){
			var menu = $(this).attr('data-menu');

			$(menu).toggleClass('min_cart_active');
			

		});

		$('.min_cart_wrapper').on('click', function(event){	
			if ( $(event.target).hasClass('min_cart_wrapper') ) {
				 $('.min_cart_active').removeClass('min_cart_active');
			}
		});
	
		$('.cart_close').on('click', function(event){	
			$('.min_cart_active').removeClass('min_cart_active');			
		});

  	
		/*END Mini Cart JS*/
  
		
		/* Image Popup */
		 $('.popbtn').magnificPopup({
			 type:'image',
			 gallery:{
				enabled:true
			  }
		});		
		
		 /*START Course*/	
		$('.course-slider').owlCarousel({
			items : 3,
			autoplay: true,
			center: true,
			loop: true,
			navText: ["<i class='fa-solid fa-arrow-left-long'></i>" ,"<i class='fa-solid fa-arrow-right-long'></i>"],
			nav: true,
			dots: false,
			margin: 30,
			responsive:{
				0:{
					items:1,
					nav: true,
					
				},
				575:{
					items:2,
					nav: true,
				},
				768:{
					items:2,
					nav: false,
					
				},
				1000:{
					items:3,
					nav: true,
			
				},
				1200:{
					items:3,
					nav: true,
				}
			}
		});
		
		/*END Course*/
		
		/*START PARTNER LOGO*/
		$('.partner-slider').owlCarousel({
			margin: 60,
			autoPlay: 5000, //Set AutoPlay to 3 seconds
			items : 6,			
			nav: false,
			dots: false,
			loop: true,
			responsive:{
				0:{
					items:2,
					
				},
				575:{
					items:3,
					
				},
				768:{
					items:4,
					
				},
				1000:{
					items:5,
			
				},
				1200:{
					items:6,
			
				}
			}
		});
		/*END PARTNER LOGO*/
		
		/*START REVIEW */

			const swiper = new Swiper('.review-slider', {
				// Optional parameters
				 slidesPerView: 2,
				  spaceBetween: 30,
				loop: true,
				// Navigation arrows
				navigation: {
				nextEl: '.rev-right',
				prevEl: '.rev-left',
				},
				
				breakpoints: {
					1299: {
						slidesPerView: 2,
					},
					1199: {
						slidesPerView: 2,
					},					
					1024: {
						slidesPerView: 1,
					},
					991: {
						slidesPerView: 2,
					},			

					767: {
						slidesPerView: 2,
					},
					575: {
						slidesPerView: 1,
					},
					0: {
						slidesPerView: 1,
					},
				},
			});

		/*END REVIEW */

		/* WOW */
		new WOW().init();

})(jQuery);
