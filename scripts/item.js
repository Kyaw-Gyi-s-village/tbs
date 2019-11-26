$(document).ready(function(){
	screen_width_em = $(window).width()/parseFloat($("body").css("font-size"));
/*promo banner slide show*/
	var img_selector = $('#slideshow img');
	const NUMBER_OF_SLIDES = img_selector.length;	//if you change slide number, you need to change number
	var img_container = document.getElementById('slideshow');
	if (img_container !== null)
		var slide_width = img_container.scrollWidth / NUMBER_OF_SLIDES; 
	var slide_number = 1;		

	var setCircle = function(circle){		//slide indicator
		for(x=1; x<=NUMBER_OF_SLIDES; x++){
			$('#circle'+x).css({
				"background-color": "#DDD"
			});	
		}
			$("#circle"+circle).css({
				"background-color": "#fed700"
			});
		}		
	
	$("#slideshow").animate({			//move to first slide when onload
		scrollLeft: 0
	});
	setCircle(1);	

	function Next_Slide(){		//move the slide to right
		if (slide_number < NUMBER_OF_SLIDES){
			$("#slideshow").animate({
				scrollLeft: slide_width * slide_number
			},600);					
			slide_number++;	
		}else{
			$("#slideshow").animate({
				scrollLeft: 0
			},600);
			slide_number = 1;
		}
		setCircle(slide_number);
	}

	function Prev_Slide(){		//move the slide to left
		--slide_number;
		if (slide_number < NUMBER_OF_SLIDES  && slide_number > 0){
			$("#slideshow").animate({
				scrollLeft: slide_width * (slide_number - 1)
			},600);					
		}
		else{
			$("#slideshow").animate({
				scrollLeft: slide_width * 3	//if you change slide number, you need to change number
			},600);
			slide_number = NUMBER_OF_SLIDES;	//if you change slide number, you need to change number
		}
		setCircle(slide_number);
	}

	var timer = ' ';
	var auto_slider = function(){
		timer = setInterval(function(){
		Next_Slide()
	}, 3000);};

	$(auto_slider());

	$(".next").click(function(){	//on right button click
		Next_Slide();
	});

	$(".prev").click(function(){	//on left button click
		Prev_Slide();
	});

	$(".slideshow-wrapper").hover(function(){	//pause on hover
		clearInterval(timer);
	},function(){
		auto_slider();
	});
/*end of promo banner slide show*/

/*fill item's data into buy now form*/
	$(".wp-buynow").click(function(){
		var id = $(this).data('id');
		var parent = $(this).parent().parent();
		var img = $('.hk-id-js', parent).attr('src');
		var name = $('.wp-item-name', parent).html();
		var price = $('.wp-item-unit-price', parent).data('prc');
		$('#hk-id-js').val(id);
		$("#wp-overlay-item-photo").attr("src", img);
		$("#wp-dialog-item-name").html(name);
		$("#wp-dialog-item-unit-price").html(price).data("prc", price);
	});
/*end of fill item's data into buy now form*/

//Calculation for total amount
	function calculate_total_amount()
	{
		var u_price = $('#wp-dialog-item-unit-price').data('prc');
		var qty = $(".qty").val();
		var total = u_price * qty;
		$('#wp-dialog-item-unit-price').html(total);
	}
//End of calculation for total amount

//blur event from number field
	$('#quan').blur(function(){
		calculate_total_amount();
	});
//end of blur event from number field

//minus button click event decrease 1 item quantity
	$(".minus").click(function(){
		var qty = $(".qty").val();
		qty--;
		if(qty > 0)
		{
			$(".qty").val(qty);
			calculate_total_amount();			
		}
	});
//end of minus button click event decrease 1 item quantity

//plus button click event increase 1 Item quantity
	$(".plus").click(function(){
		var qty = $(".qty").val();
		var max_qty = $(".qty").attr("max");
		qty++;

		if(qty <= max_qty)
		{
			$(".qty").val(qty);
			calculate_total_amount();
		}
	});
//end of plus button click event increase 1 Item quantity
});


