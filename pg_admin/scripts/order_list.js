$(document).ready(function(){

//change permission for account by id
	function change_status(id, status){
		$.post(web_url + "/pg_admin/order/update_status/", { id: id, status: status });
	}
	$(".hk-edit-status-js").click(function(){
		var id = $(this).data("id");
		if ($(this).is(":checked")) {
			change_status(id, 1);
		}
		else
			change_status(id, 0);		
	});
//end of change permission for account by id

});