$(document).ready(function(){
//Add item to Session cart function
	function add_qty(id){
		$.ajax({
			url: web_url + '/cart/add/',
			type: 'POST',
			data: {'id': id},
			success: function(result)
			{
				$('#hk-cart-qty-js').html(result.qty);
				$("#cart").addClass("cart-ani");	/*fixed*/
				setTimeout(RemovePop, 500);
					function RemovePop(){
						$('#cart').removeClass("cart-ani");
					}
			},
			error: function(jqxhr, status, exception)
			{
				alert('Exception: ', exception);
				alert(status);
			},
			dataType: 'json'
		});
	}
//End of add item to Session cart function

//Change Remark from Session
	function change_remark(id, remark){
		$.post(web_url + '/cart/update_remark/',{id: id, remark: remark});
	}
//end of change Remark from Session

//blur event from remark box, it change remark
	$(".hk-remark-txt-js").blur(function(){
		var id = $(this).data("id");
		var remark = $(this).val();
		if(remark != "")
			change_remark(id, remark);
	});
//end of blur event from remark box, it change remark

//Add to cart event
	$(".wp-addtocart").click(function(){
		var id = $(this).data("id");
		add_qty(id);
	});
//End of add to cart event
});