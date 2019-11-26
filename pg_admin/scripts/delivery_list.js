$(document).ready(function(){

//create and edit form pop up box
	$(".hk-create-js, .hk-edit-js").click(function(){
		$(".wp-overlay").css("transform", "scale(1)");
	});

	$("#wp-overlay-close").click(function(){
		$(".wp-overlay").css("transform", "scale(0)");
		$('form').attr("action", web_url + "/pg_admin/delivery/add/");
	});
//end of create and edit form pop up box

//edit related promotion text
	$(".hk-edit-js").click(function(){
		var parent = $(this).parent().parent().parent();
		var id = $(this).data('id');
		var name= $('#hk-name-js', parent).html();
		var sandr= $('#hk-sandr-js', parent).html();
		var price= $('#hk-price-js', parent).html();
		var ltime= $('#hk-ltime-js', parent).html();


		$('#id').attr("value", id);
		$('#tandcname').attr("value",name);
		$('#sandrname').attr("value",sandr);
		$('#price').attr("value",price);
		$('#time').attr("value",ltime);

		$('form').attr("action",  web_url + "/pg_admin/delivery/edit/");

	});
//end of edit related promotion text

});