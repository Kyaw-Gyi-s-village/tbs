$(document).ready(function(){

//create form pop up box
	$(".hk-create-js").click(function(){
		$(".wp-overlay").css("transform", "scale(1)");
	});

	$("#wp-overlay-close").click(function(){
		$(".wp-overlay").css("transform", "scale(0)");
	});
//end of create form pop up box

//change permission for account by id
	function change_permission(id, permission){
		$.post(web_url+"/pg_admin/login/update_permission/", { id: id, permission: permission });
	}
	$(".hk-edit-per-js").click(function(){
		var id = $(this).data("id");
		if ($(this).is(":checked")) {
			change_permission(id, 1);
		}
		else
			change_permission(id, 0);		
	});
//end of change permission for account by id

});