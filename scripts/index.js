$(document).ready(function(){

//back to top function
	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 100) { 
			$('#scroll').fadeIn(); 
		} else { 
			$('#scroll').fadeOut(); 
		} 
	}); 
	$('#scroll').click(function(){ 
		$("html, body").animate({ scrollTop: 0 }, 600); 
		return false; 
	});
//back to top function

//button functions to open and close menu 
	$("#menu-img").click(function(e){
	  $("#menu").slideToggle("fast");
	  e.stopPropagation();
	  return false;
	});

	$("#category-list").click(function(){
		$("#category").slideToggle("fast");
	});

	$("#menu").click(function(e){
		e.stopPropagation();
	});

	$(document).click(function(){
		$("#menu").slideUp("fast");
		$(".menu-ani").removeClass("menu-active");		
	});
//end of button functions to open and close menu 

//buy now pop up box
	$(".wp-buynow, .wp-detail-buynow").click(function(){
		$(".wp-overlay").css("transform", "scale(1)");
	});

	$("#wp-overlay-close").click(function(){
		$(".wp-overlay").css("transform", "scale(0)");
	});

	var modal = document.getElementById('modal');
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.transform = "scale(0)";
		}
	}
//end of buy now pop up box

//Add to cart animation
	$(".wp-addtocart").click(function(){		/*fixed*/
		var parent = $(this).parent();
		var cart = $("#wp-addtocart-clone", parent);
		var tooltip = $(".wp-tooltip", parent);
		tooltip.css("display", "none");
		cart.addClass("wp-addtocart-clone-ani");
		setTimeout(RemoveAni, 500);
		function RemoveAni(){
			cart.removeClass("wp-addtocart-clone-ani");
		}
	});
//End of add to cart animation
	$(".menu-ani").click(function(){
    	$(this).toggleClass("menu-active");
  	});

});