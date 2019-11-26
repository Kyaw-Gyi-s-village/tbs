$(document).ready(function(){
//create and edit for promo text and create for promo photo pop up box
	$(".hk-create-text-js, .hk-edit-js, .hk-create-photo-js").click(function(){
		$(".wp-overlay").css("transform", "scale(1)");
	});
	$('#promo_photo').hide();
	$("#wp-overlay-close").click(function(){
		$(".wp-overlay").css("transform", "scale(0)");
		$('#wp-overlay-name').html("Add new Promotion Text");
		$('form').attr("action", web_url + "/pg_admin/promo/add_text/");
		$('#promo_text').show();
		$('#promo_photo').hide();
		$('form').attr("enctype", "application/x-www-form-urlencoded");
		$('#promo_text').attr("name", "promo_text");
		$('#hk-form-button-js').val("Add");
	});
//end of create and edit for promo text and create for promo photo pop up box

//edit related promotion text
	$(".hk-edit-js").click(function(){
		var parent = $(this).parent().parent();
		var id = $(this).data('id');
		var promo_text= $('#hk-promo-text-js', parent).html();
		$('#wp-overlay-name').html("Edit Promotion Text");
		$('#id').attr("value", id);
		$('#promo_text').html(promo_text);
		$('#hk-form-button-js').val("Edit");
		$('form').attr("action",  web_url + "/pg_admin/promo/edit_text/");

	});
//end of edit related promotion text

//create promotion photo
	$(".hk-create-photo-js").click(function(){
		$('form').attr("enctype", "multipart/form-data");
		$('form').attr("action", web_url + "/pg_admin/promo/add_photo/");
		$('#promo_text').hide();
		$('#promo_text').attr("name", "");
		$('label').attr('for', "promo_photo");
		$('label').html("Promotion Photo");
		$('#promo_photo').show();
	});
//end of create promotion photo

//click event to view photo
	$(".wp-view-photo").click(function(){
		$(".photo-overlay").css("transform", "scale(1)");
		var parent = $(this).parent().parent().parent();
		var img = $('img', parent).attr('src');
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