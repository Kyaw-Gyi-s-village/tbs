$(document).ready(function(){

	$(".wp-product-photo").mouseover(function(){
		var $this = $(this);
    var photo = $this.attr("src");
    $("#wp-default-photo").attr("src", photo);
    $(".wp-zoom").css("background-image", "url("+photo+")");
    /*$(".large").css("background-image", "url("+photo+")");*/			//for magnifier 
	});

/*for zoom*/
  	$(".wp-zoom").mousemove(function(e){
			zoom(e);
		});

		function zoom(e){
			var x, y;
			var zoomer = e.currentTarget;
			if(e.offsetX) {
				offsetX = e.offsetX;
			} else {
				offsetX = e.touches[0].pageX;
			}

			if(e.offsetY) {
				offsetY = e.offsetY;
			} else {
				offsetX = e.touches[0].pageX;
			}
			x = offsetX/zoomer.offsetWidth*100;
			y = offsetY/zoomer.offsetHeight*100;
			zoomer.style.backgroundPosition = x+'%'+y+'%';
		}
/*end zoom*/

/*Add to cart animation*/
	$(".wp-detail-addtocart").click(function(){
		var icon = $(".wp-detail-addtocart-icon");
		icon.css("position", "absolute");
		icon.animate({top: "0", right: "0"}, 1000);
		icon.css("opacity", "0");
	});
/*End of add to cart animation*/

/*About product animation*/
	$("a").on('click', function(event){
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    } 
  });			
/*End of about product animation*/

/*about detail*/
	function LeftRemove(){
		$("#wp-zawgyi, #wp-unicode").removeClass("wp-animation-left");
		$("#wp-about-zawgyi, #wp-about-unicode").removeClass("wp-about-left");
	}
	function RightRemove(){
		$("#wp-zawgyi, #wp-unicode").removeClass("wp-animation-right");
		$("#wp-about-zawgyi, #wp-about-unicode").removeClass("wp-about-right");
	}
	function RightAdd(){
		$("#wp-zawgyi, #wp-unicode").addClass("wp-animation-right");
		$("#wp-about-zawgyi, #wp-about-unicode").addClass("wp-about-right");
	}
	function LeftAdd(){
		$("#wp-zawgyi, #wp-unicode").addClass("wp-animation-left");
		$("#wp-about-zawgyi, #wp-about-unicode").addClass("wp-about-left");
	}
	$("#wp-about-left").click(function(){
		RightRemove();
			$("#wp-unicode").toggle();
			$("#wp-zawgyi").toggle();
				$("#wp-about-unicode").toggle();
				$("#wp-about-zawgyi").toggle();
		LeftAdd();
	});
	$("#wp-about-right").click(function(){
		LeftRemove();
			$("#wp-zawgyi").toggle();
			$("#wp-unicode").toggle();
				$("#wp-about-zawgyi").toggle();
				$("#wp-about-unicode").toggle();
		RightAdd();
	});
/*end about detail*/

/*fill item's data into buy now form*/
	$(".wp-detail-buynow").click(function(){
		var id = $(this).data('id');
		var img = $('#wp-default-photo').attr('src');
		var name = $('#wp-detail-item-name').html();
		var u_price = $('#wp-detail-item-unit-price').data('prc');
		var price = $('#hk-amount-js').html();

		$('#hk-id-js').val(id);
		$("#wp-overlay-item-photo").attr("src", img);
		$("#wp-dialog-item-name").html(name);
		$("#wp-dialog-item-unit-price").html(price).data("prc", u_price);

	});
/*end of fill item's data into buy now form*/

//Calculation for total amount
	function calculate_total_amount(select)
	{
		var u_price = $('#wp-detail-item-unit-price').data('prc');
		var qty = select.val();
		var total = u_price * qty;
		$('#wp-detail-item-total-price>span').html(total);
		$('#wp-dialog-item-unit-price').html(total);
	}
//End of calculation for total amount

//blur event from number field
	$('.qty').blur(function(){
		var select = $(this);
		calculate_total_amount(select);
	});
//end of blur event from number field

//minus button click event decrease 1 item quantity
	$(".minus").click(function(){
		var parent = $(this).parent();
		var qty = $(".qty", parent).val();
		qty--;
		if(qty > 0)
		{
			$(".qty").val(qty);
			calculate_total_amount($(".qty", parent));			
		}
	});
//end of minus button click event decrease 1 item quantity

//plus button click event increase 1 Item quantity
	$(".plus").click(function(){
		var parent = $(this).parent();
		var qty = $(".qty", parent).val();
		var max_qty = $(".qty").attr("max");
		qty++;

		if(qty <= max_qty)
		{
			$(".qty").val(qty);
			calculate_total_amount($(".qty", parent));
		}
	});
//end of plus button click event increase 1 Item quantity

//related item
	$(".related-about").hover(function(){
		var $this = $(this);
		$this.css("opacity", "1");
	},function(){
		var $this = $(this);
		$this.css("opacity", "0");
	});

	var currentSlide = 0;
	var $slides = $('.related-photos');
	var $totalSlides = $slides.length;

	$slides.hide();
	$slides.eq(currentSlide).css('display', 'block');
	$slides.eq(currentSlide+1).css('display', 'block');

	function cycleSlides() {
		var $slide1 = $('.related-photos').eq(currentSlide);
		var $slide2 = $('.related-photos').eq(currentSlide+1);

		$slides.hide();

		$slide1.css('display', 'block');
		$slide2.css('display', 'block');

		$slide1.addClass("slide-animation");
		$slide2.addClass("slide-animation");
	}

	$('#related-down').click(function() {
		currentSlide += 2;
		if (currentSlide > $totalSlides - 1)
			currentSlide = 0;

		cycleSlides();
	});

	$('#related-up').click(function() {
		currentSlide -= 2;
		if (currentSlide < 0)
			currentSlide = $totalSlides - 1;

		cycleSlides();
	});
//end of related item

//click event to view photo
	$("#wp-default-photo").click(function(){
		$(".photo-overlay").css("transform", "scale(1)");
		var img = $(this).attr('src');
		$('#wp-img-target').attr('src', img);
	});

	$("#photo-overlay-close").click(function(){
		$(".photo-overlay").css("transform", "scale(0)");
	});

	$(".photo-overlay").click(function(){
		$(".photo-overlay").css("transform", "scale(0)");
	});
//end of click event to view photo

});