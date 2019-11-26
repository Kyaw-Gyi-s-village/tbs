$(document).ready(function(){
//create item form overlay
	$(".header-button, .hk-edit-photo-js, .hk-edit-others-js").click(function(){
		$(".wp-overlay").css("transform", "scale(1)");
	});

	$("#wp-overlay-close").click(function(){
		$(".wp-overlay").css("transform", "scale(0)");
		$('#wp-overlay-name').html("Add new Promotion Text");
		$('#admin-overlay-button input').attr('value', "Add Item");
		$('form').attr("action", web_url + "/pg_admin/item/add/");
		$('#item_name').attr('name', "item_name").show();
		$('#item_code').attr('name', "item_code").show();
		$('#stock').attr('name', "stock").show();
		$('#price').attr('name', "price").show();
		$('#discount_percent').attr('name', "discount_percent").show();
		$('#summary_zawgyi').attr('name', "summary_zawgyi").show();
		$('#summary_unicode').attr('name', "summary_unicode").show();
		$('#category_id').attr('name', "category_id").show();
		$('#add-photo, .photo-frame').show();
		$('label').show();

		//empty related field
		$('#item_name').val('');
		$('#item_code').val('');
		$('#price').val('');
		$('#discount_percent').val('');
		$('#summary_zawgyi').val('');
		$('#summary_unicode').val('');
	});

	$('.hk-edit-photo-js').click(function(){
		var id = $(this).parent().parent().data('id');
		$('#wp-overlay-name').html("Edit related Photos");
		$('#admin-overlay-button input').attr('value', "Edit Photo");
		$('form').attr("action", web_url + "/pg_admin/item/edit_photos/");
		$('#hk-item-id-js').val(id);
		$('#item_name').attr('name', "").hide();
		$('#item_code').attr('name', "").hide();
		$('#stock').attr('name', "").hide();
		$('#price').attr('name', "").hide();
		$('#discount_percent').attr('name', "").hide();
		$('#summary_zawgyi').attr('name', "").hide();
		$('#summary_unicode').attr('name', "").hide();
		$('#category_id').attr('name', "").hide();
		$('label').hide();
	});

	$('.hk-edit-others-js').click(function(){
		var id = $(this).parent().parent().data('id');
		$('#wp-overlay-name').html("Edit related Information");
		$('#admin-overlay-button input').attr('value', "Edit");
		$('form').attr("action", web_url + "/pg_admin/item/edit_others/");
		$('#hk-item-id-js').val(id);
		$('#add-photo, .photo-frame').hide();
		//fill related field
		var par = $(this).parent().parent().parent().parent();
		$('#item_name').val($(".item-name", par).html());
		$('#item_code').val($(".item-code", par).data('icode'));
		$('#price').val($(".price", par).data('price'));
		$('#discount_percent').val($(".price", par).data('disper'));
		$('#summary_zawgyi').val($(".summary_zawgyi", par).html());
		$('#summary_unicode').val($(".summary_unicode", par).html());
	});


//end of create item form overlay


//photo remove and add up to 6
	var qty = 0;
	$("#hk-add-photo").click(function(){
		if(qty<6)
		{
			$("#hk-remove-photo").attr({"class":"", "disabled":false});
			var photo = $("<input>",{ "type": "file", "name": "p" + qty, "id": "p" + qty++  });
			var addphoto = $("<div>").append(photo);
			$("#photo").append(addphoto);
		}
		else
			$("#hk-add-photo").attr({"class":"disable", "disabled":true});
	});

	$("#hk-remove-photo").click(function(){
		if(qty > 0)
		{
			$("#hk-add-photo").attr({"class":"", "disabled":false});
			--qty;
			$("#p" + qty).parent().remove();
		}
		else
			$("#hk-remove-photo").attr({"class":"disable", "disabled":true});
	});
//end of photo add and remove

$("form").submit(function(){
	var total_photo = $("input[type=file]");
	var photo_length = total_photo.length;
	var photo_qty = $("<input>", { "type": "hidden", "value": photo_length, "name": "photo_qty" });
	$("#photo").append(photo_qty);
});

/*edit item popover*/
	$(".item-edit").click(function(){
		var parent = $(this).parent();
		var popover = $(".item-edit-popover", parent);
		popover.toggleClass("item-edit-popover-ani");
	});

	$(".item-edit-popover").mousedown(function(){
		var parent = $(this).parent();
		var popover = $(".item-edit-popover", parent);
		popover.removeClass("item-edit-popover-ani");
	});
/*end of edit item popover*/

});
