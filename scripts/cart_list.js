//Calculation for total amount
	function calculate_total_amount()
	{
		var each_item_cost = $('.hk-total-price-js');
		var each_item_cost_length = each_item_cost.length;
		var total = 0;
		for(i=0; i<each_item_cost_length; i++)
		{
			var val = $(".hk-total-price-js"+i).html();
			total += parseInt(val);
		}
		$('#hk-total-amount-js').html(total);
	}
//End of calculation for total amount

//Change Item quantity from Session
	function change_qty(id, qty){
		$.post( web_url + '/cart/update_qty/',{ id: id, quantity: qty }, function(data){ 
			$('#hk-cart-qty-js').html(data.qty);
		}, "json");
	}
//end of change Item quantity from Session

//Blur event from qty box, it change qty 
	$(".qty").blur(function(){
		var id = $(this).parent().data("id");
		var qty = $(this).val();
		if(qty>0)
		{
			change_qty(id, qty);
			var parent = $(this).parent().parent().parent();
			var u_price = $(".hk-price-js", parent).data("prc");
			var total = u_price * qty;
			$(".hk-total-price-js", parent).html(total);
		}
		else
		{
			qty = 1;
			$(this).val(qty);
			change_qty(id, qty);
			var parent = $(this).parent().parent().parent();
			var u_price = $(".hk-price-js", parent).data("prc");
			var total = u_price * qty;
			$(".hk-total-price-js", parent).html(total);			
		}
		calculate_total_amount();
	});
//End of blur event from qty box, it change qty

//minus button click event decrease 1 item quantity from Session
	$(".minus").click(function(){
		var parent = $(this).parent();
		var id = parent.data("id");
		var qty = $(".qty", parent).val();
		qty--;
		if(qty > 0)
		{
			change_qty(id, qty);
			$(".qty", parent).val(qty);
			var parent = $(this).parent().parent().parent();
			var u_price = $(".hk-price-js", parent).data("prc");
			var total = u_price * qty;
			$(".hk-total-price-js", parent).html(total);
			calculate_total_amount();			
		}
	});
//end of minus button click event decrease 1 item quantity from Session

//plus button click event increase 1 Item quantity from Session
	$(".plus").click(function(){
		var parent = $(this).parent();
		var id = parent.data("id");
		var qty = $(".qty", parent).val();
		var max_qty = $(".qty", parent).attr("max");
		qty++;

		if(qty <= max_qty)
		{
			change_qty(id, qty);
			$(".qty", parent).val(qty);
			var parent = $(this).parent().parent().parent();
			var u_price = $(".hk-price-js", parent).data("prc");
			var total = u_price * qty;
			$(".hk-total-price-js", parent).html(total);
			calculate_total_amount();
		}
	});
//end of plus button click event increase 1 Item quantity from Session

//delete icon hover event
	$(".dust_bin").mouseenter( function(){
		$(this).attr("src", web_url_file + '/icons/dust_bin_open.png');
	});

	$(".dust_bin").mouseleave( function(){
		$(this).attr("src", web_url_file + '/icons/dust_bin_close.png');
	});
//end of delete icon hover event