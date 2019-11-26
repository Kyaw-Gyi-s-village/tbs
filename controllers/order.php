<?php 
	switch($action){
		case "submit_from_buy_now":
			submit_order_from_buy_now(); break;
		case "submit_from_cart":
			submit_order_from_cart(); break;
		default:
			exit("Unknown action");
	}

	function submit_order_from_buy_now()
	{
		global $url;
		$id = strip_tags($_POST['id']);
		$qty = strip_tags($_POST['qty']);
		$name = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);
		$address = strip_tags($_POST['address']);
		$remark = strip_tags($_POST['remark']);

		if($id=='' OR $name=='' OR $phone=='')
		{
			header("location: $url/");
			exit("fake request");
		}
		create_order_from_buy_now( $id, $qty, $name, $phone, $address, $remark);
		header("location: $url/");
	}

	function submit_order_from_cart()
	{
		global $url;
		$name = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);
		$address = strip_tags($_POST['address']);
		$remark = strip_tags($_POST['remark']);

		if($name=='' OR $phone=='')
		{
			header("location: $url/");
			exit("fake request");
		}
		create_order_from_cart( $name, $phone, $address, $remark);
		header("location: $url/");
	}

 ?>