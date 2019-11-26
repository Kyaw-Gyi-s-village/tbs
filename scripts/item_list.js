$(document).ready(function(){
	screen_width_em = $(window).width()/parseFloat($("body").css("font-size"));
/*items slide effect*/
	

	if(screen_width_em <= 30)
	{
		function cycleSlides(current_slide, slides, parent) {
			var slide1 = $('.wp-item-box', parent).eq(current_slide);
			var slide2 = $('.wp-item-box', parent).eq(current_slide+1);

			slides.hide();

			slide1.css('display', 'block');
			slide2.css('display', 'block');	
		}

		function SlideLeftAdd(slides, current_slide){
			slides.eq(current_slide).addClass("slide-left");
			slides.eq(current_slide+1).addClass("slide-left");
		}

		function SlideRightAdd(slides, current_slide){
			slides.eq(current_slide).addClass("slide-right");
			slides.eq(current_slide+1).addClass("slide-right");
		}

		function SlideLeftRemove(slides, current_slide){
			slides.eq(current_slide).removeClass("slide-left");
			slides.eq(current_slide+1).removeClass("slide-left");
		}

		function SlideRightRemove(slides, current_slide){
			slides.eq(current_slide).removeClass("slide-right");
			slides.eq(current_slide+1).removeClass("slide-right");
		}

		$('.wp-item-box').css('display', 'none');
		$('.hk-item-0').css('display', 'block');
		$('.hk-item-1').css('display', 'block');

		$('.wp-right').click(function(){
			var parent = $(this).parent().parent().parent();
			var current_slide = parent.data('current_slide');

			var slides = $('.wp-item-box', parent);
			var total_slides = slides.length;

			current_slide += 2;
			if(current_slide > total_slides-1)
				current_slide = 0;

			parent.data('current_slide', current_slide);
			cycleSlides(current_slide, slides, parent);
			SlideLeftRemove(slides, current_slide);
			SlideRightAdd(slides, current_slide);
		});

		$('.wp-left').click(function() {
			var parent = $(this).parent().parent().parent();
			var current_slide = parent.data('current_slide');

			var slides = $('.wp-item-box', parent);
			var total_slides = slides.length;

			current_slide -= 2;
			if(current_slide < 0)
				current_slide = total_slides - 1;
			
			parent.data('current_slide', current_slide);
			cycleSlides(current_slide, slides, parent);
			SlideRightRemove(slides, current_slide);
			SlideLeftAdd(slides, current_slide);	
		});
	}
	else if(screen_width_em > 30 && screen_width_em <60)
	{
		function cycleSlides(current_slide, slides, parent) {
			var slide1 = $('.wp-item-box', parent).eq(current_slide);
			var slide2 = $('.wp-item-box', parent).eq(current_slide+1);
			var slide3 = $('.wp-item-box', parent).eq(current_slide+2);

			slides.hide();

			slide1.css('display', 'block');
			slide2.css('display', 'block');	
			slide3.css('display', 'block');	
		}

		function SlideLeftAdd(slides, current_slide){
			slides.eq(current_slide).addClass("slide-left");
			slides.eq(current_slide+1).addClass("slide-left");
			slides.eq(current_slide+2).addClass("slide-left");
		}

		function SlideRightAdd(slides, current_slide){
			slides.eq(current_slide).addClass("slide-right");
			slides.eq(current_slide+1).addClass("slide-right");
			slides.eq(current_slide+2).addClass("slide-right");
		}

		function SlideLeftRemove(slides, current_slide){
			slides.eq(current_slide).removeClass("slide-left");
			slides.eq(current_slide+1).removeClass("slide-left");
			slides.eq(current_slide+2).removeClass("slide-left");
		}

		function SlideRightRemove(slides, current_slide){
			slides.eq(current_slide).removeClass("slide-right");
			slides.eq(current_slide+1).removeClass("slide-right");
			slides.eq(current_slide+2).removeClass("slide-right");
		}

		$('.wp-item-box').css('display', 'none');
		$('.hk-item-0').css('display', 'block');
		$('.hk-item-1').css('display', 'block');
		$('.hk-item-2').css('display', 'block');

		$('.wp-right').click(function(){
			var parent = $(this).parent().parent().parent();
			var current_slide = parent.data('current_slide');

			var slides = $('.wp-item-box', parent);
			var total_slides = slides.length;

			current_slide += 3;
			if(current_slide > total_slides-1)
				current_slide = 0;

			parent.data('current_slide', current_slide);
			cycleSlides(current_slide, slides, parent);
			SlideLeftRemove(slides, current_slide);
			SlideRightAdd(slides, current_slide);
		});
		$('.wp-left').click(function() {
			var parent = $(this).parent().parent().parent();
			var current_slide = parent.data('current_slide');

			var slides = $('.wp-item-box', parent);
			var total_slides = slides.length;

			current_slide -= 3;
			if(current_slide < 0)
				current_slide = total_slides - 1;
			
			parent.data('current_slide', current_slide);
			cycleSlides(current_slide, slides, parent);
			SlideRightRemove(slides, current_slide);
			SlideLeftAdd(slides, current_slide);	
		});
	}
	else
	{
		function cycleSlides(current_slide, slides, parent) {
			var slide1 = $('.wp-item-box', parent).eq(current_slide);
			var slide2 = $('.wp-item-box', parent).eq(current_slide+1);
			var slide3 = $('.wp-item-box', parent).eq(current_slide+2);
			var slide4 = $('.wp-item-box', parent).eq(current_slide+3);

			slides.hide();

			slide1.css('display', 'block');
			slide2.css('display', 'block');	
			slide3.css('display', 'block');	
			slide4.css('display', 'block');	
		}

		function SlideLeftAdd(slides, current_slide){
			slides.eq(current_slide).addClass("slide-left");
			slides.eq(current_slide+1).addClass("slide-left");
			slides.eq(current_slide+2).addClass("slide-left");
			slides.eq(current_slide+3).addClass("slide-left");
		}

		function SlideRightAdd(slides, current_slide){
			slides.eq(current_slide).addClass("slide-right");
			slides.eq(current_slide+1).addClass("slide-right");
			slides.eq(current_slide+2).addClass("slide-right");
			slides.eq(current_slide+3).addClass("slide-right");
		}

		function SlideLeftRemove(slides, current_slide){
			slides.eq(current_slide).removeClass("slide-left");
			slides.eq(current_slide+1).removeClass("slide-left");
			slides.eq(current_slide+2).removeClass("slide-left");
			slides.eq(current_slide+3).removeClass("slide-left");
		}

		function SlideRightRemove(slides, current_slide){
			slides.eq(current_slide).removeClass("slide-right");
			slides.eq(current_slide+1).removeClass("slide-right");
			slides.eq(current_slide+2).removeClass("slide-right");
			slides.eq(current_slide+3).removeClass("slide-right");
		}

		$('.wp-item-box').css('display', 'none');
		$('.hk-item-0').css('display', 'block');
		$('.hk-item-1').css('display', 'block');
		$('.hk-item-2').css('display', 'block');
		$('.hk-item-3').css('display', 'block');

		$('.wp-right').click(function(){
			var parent = $(this).parent().parent().parent();
			var current_slide = parent.data('current_slide');

			var slides = $('.wp-item-box', parent);
			var total_slides = slides.length;

			current_slide += 4;
			if(current_slide > total_slides-1)
				current_slide = 0;

			parent.data('current_slide', current_slide);
			cycleSlides(current_slide, slides, parent);
			SlideLeftRemove(slides, current_slide);
			SlideRightAdd(slides, current_slide);
		});
		$('.wp-left').click(function() {
			var parent = $(this).parent().parent().parent();
			var current_slide = parent.data('current_slide');

			var slides = $('.wp-item-box', parent);
			var total_slides = slides.length;

			current_slide -= 4;
			if(current_slide < 0)
				current_slide = total_slides - 1;
			
			parent.data('current_slide', current_slide);
			cycleSlides(current_slide, slides, parent);
			SlideRightRemove(slides, current_slide);
			SlideLeftAdd(slides, current_slide);	
		});
	}

/*end of items slide effect*/	
});