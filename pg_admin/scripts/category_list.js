$(document).ready(function(){
//create and edit form pop up box
	$(".wp-buynow, .hk-edit-js").click(function(){
		$(".wp-overlay").css("transform", "scale(1)");
	});

	$("#wp-overlay-close").click(function(){
		$(".wp-overlay").css("transform", "scale(0)");
		$('form').attr("action", web_url + "/pg_admin/category/add/");
		$('#category_name').attr("value", "");
		$('#wp-overlay-name').html("Add new Category name");
		$('#hk-form-button-js').val("Add");
	});
//end of create and edit form pop up box


//sortable list categories
	$('.hk-edit-status-js').each(function(){
		if(!$(this).is(':checked'))
			$(this).parent().addClass('unchecked');
	}).click(function(){
		if(!$(this).is(':checked'))
			$(this).parent().addClass('unchecked');
		else
			$(this).parent().removeClass('unchecked');
	});
	$( '#sortable' ).sortable();
	$( '#sortable' ).disableSelection();
	$( '#sortable' ).sortable("disable");
	function change_order(id, order_num){
		$.post( web_url + '/pg_admin/category/update_order', {id: id, order_num: order_num});
	}
	$('.hk-edit-list-js').click(function(){
		$(this).css('display', 'none');
		$('.hk-done-list-js').css('display', 'block');
		$( '#sortable' ).sortable("enable");
	});

	$('.hk-done-list-js').click(function(){
		$(this).css('display', 'none');
		$( '#sortable' ).sortable("disable");
		$('.hk-sortable-list').each(function(){
			var order_num = $('#sortable li').index(this);
			var id = $(this).data('id');
			change_order(id, order_num);
		});

		$('.hk-edit-list-js').css('display', 'block');
	});
//end of sortable list categories

//edit related category
	$(".hk-edit-js").click(function(){
		var parent = $(this).parent().parent();
		var id = $(this).data('id');
		var category_name = $('.hk-cat-name-js', parent).html();
		$('#id').attr("value", id);
		$('#category_name').attr("value", category_name);
		$('form').attr("action",  web_url + "/pg_admin/category/edit/");
		$('#wp-overlay-name').html("Edit Category name");
		$('#hk-form-button-js').val("Edit");

	});
//end of edit related category

//edit status by id
	function change_status(id, status){
		$.post( web_url + "/pg_admin/category/update_status/", { id: id, status: status });
	}
	
	$(".hk-edit-status-js").click(function(){
		var id = $(this).data("id");
		if ($(this).is(":checked")) {
			change_status(id, 1);
		}
		else
			change_status(id, 0);		
	});
//end of edit status by id

});