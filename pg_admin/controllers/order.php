<?php 
	switch($action)
	{
		case "":
		case "new_list":
			new_list(); break;
		case "completed_list":
			completed_list(); break;
		case "order_detail":
			order_detail($id); break;
		case "update_status":
			edit_status();break;
		default:
			exit("Unknow action");
	}

	function new_list()
	{
		$pg_title = "Order | The Best Shop";
		$orders = get_new_orders();

		render("order_list", $pg_title, $orders);
	}

	function completed_list()
	{
		$pg_title = "Order | The Best Shop";
		$orders = get_completed_orders();
		render("order_list", $pg_title, $orders);
	}

	function order_detail($id)
	{
		$pg_title = "Order | The Best Shop";
		$order_items = get_order_items($id);
		render("order_detail", $pg_title, $order_items, $id);
	}

	function edit_status()
	{
		$id = strip_tags($_POST['id']);
		$status = strip_tags($_POST['status']);
		update_status($id, $status);
	}

 ?>