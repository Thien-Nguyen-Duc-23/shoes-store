jQuery(document).ready(function($) {
	function tab_product_detail() {
		$(".e-tabs:not(.not-dqtab)").each( function(){
			$(this).find('.tabs-title li:first-child').addClass('current');
			$(this).find('.tab-content').first().addClass('current');

			$(this).find('.tabs-title li').click(function(){
				var tab_id = $(this).attr('data-tab');

				var url = $(this).attr('data-url');
				$(this).closest('.e-tabs').find('.tab-viewall').attr('href',url);

				$(this).closest('.e-tabs').find('.tabs-title li').removeClass('current');
				$(this).closest('.e-tabs').find('.tab-content').removeClass('current');

				$(this).addClass('current');
				$(this).closest('.e-tabs').find("#"+tab_id).addClass('current');
			});    
		});

		$('.btn--view-more').on('click', function(e){
			e.preventDefault();
			var $this = $(this);
			$this.parents('#tab-1').find('.product-well').toggleClass('expanded');
			$(this).toggleClass('active');
			return false;
		});

	}
	tab_product_detail();

	function awe_owl() { 
		$('.owl-carousel:not(.not-aweowl)').each( function(){
			var xs_item = $(this).attr('data-xs-items');
			var md_item = $(this).attr('data-md-items');
			var lg_item = $(this).attr('data-lg-items');
			var sm_item = $(this).attr('data-sm-items');	
			var margin=$(this).attr('data-margin');
			var dot=$(this).attr('data-dot');
			var nav=$(this).attr('data-nav');
			var height=$(this).attr('data-height');
			var play=$(this).attr('data-play');
			var timeout=$(this).attr('data-timeout');
			var loop=$(this).attr('data-loop');
			if (typeof margin !== typeof undefined && margin !== false) {    
			} else{
				margin = 30;
			}
			if (typeof xs_item !== typeof undefined && xs_item !== false) {    
			} else{
				xs_item = 1;
			}
			if (typeof sm_item !== typeof undefined && sm_item !== false) {    

			} else{
				sm_item = 3;
			}	
			if (typeof md_item !== typeof undefined && md_item !== false) {    
			} else{
				md_item = 3;
			}
			if (typeof lg_item !== typeof undefined && lg_item !== false) {    
			} else{
				lg_item = 3;
			}
			if (typeof dot !== typeof undefined && dot !== true) {   
				dot= true;
			} else{
				dot = false;
			}
			if (typeof play !== typeof undefined && play !== true) {   
				play= true;
			} else{
				play = false;
			}
			if (typeof timeout !== typeof undefined && timeout !== true) {
			} else{
				timeout = 3500;
			}
			$(this).owlCarousel({
				loop:loop,
				rewind:true,
				margin:Number(margin),
				responsiveClass:true,
				dots:dot,
				nav:nav,
				autoHeight: false,
				autoplay:play,
				autoplayspeed:500,
				autoplayTimeout:timeout,
				autoplayHoverPause:true,
				responsive:{
					0:{
						items:Number(xs_item)				
					},
					600:{
						items:Number(sm_item)				
					},
					1000:{
						items:Number(md_item)				
					},
					1200:{
						items:Number(lg_item)				
					}
				}
		}).on('changed.owl.carousel', check_last_active); // check last active owl item
		})
	}
	awe_owl();

	function check_last_active(){
		var x = $('.owl-carousel:not(.slider)');
		setTimeout(function(){
			x.find('.active .product-col-1').css('border-right','1px solid #ebebeb');
			if(x.find('.active').last()){
				x.find('.active:last').find('.product-col-1').css('border-right','none');
			}
		}, 300);
	}

	function zoom_check() {
		var ww = window.innerWidth;
		$("#img_01").elevateZoom({
			gallery:'gallery_02', 
			zoomWindowWidth:420,
			zoomWindowHeight:500,
			zoomWindowOffetx: 10,
			easing : true,
			scrollZoom : false,
			cursor: 'pointer', 
			galleryActiveClass: 'active', 
			imageCrossfade: true
		});
		var elevate = $("#img_01").data('elevateZoom');
		if (ww >= 768){
			elevate.changeState('enable');
		}else {
			elevate.changeState('disable');
		}
	}

	function zoom_pro_large() {
		zoom_check();
		$(window).resize(function(e) {
			zoom_check();
		});
	}
	zoom_pro_large();

	function add_to_cart_popup() {
		$('#add-to-cart-form button').click(function() {
			$('body').css('overflow', 'hidden');
			$('#popup-cart').show();
	
			return false;
		});

		$('#popup-cart .close-window').click(function() {
			$('#popup-cart').hide();
			$('body').removeAttr('style');
		});

		$('#popup-cart').click(function(e) {
			if(e.target != this) return;
			$('#popup-cart').hide();
			$('body').removeAttr('style');
		});
	}
	add_to_cart_popup();
});