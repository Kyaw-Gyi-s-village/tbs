<?php 
	function item_qty()
	{
		$cart = 0;
		foreach($_SESSION['cart'] as $qty)
			$cart += $qty;
		return $cart;
	}

	function add_cart($id)
	{
		if(!isset($_SESSION['cart']["$id"]))
			$_SESSION['cart'][$id]=1;
		else
			$_SESSION['cart'][$id]++;	

		$qty = item_qty();
		echo json_encode(array("qty" => $qty));
	}

	function add_carts($id, $qty, $remark)
	{
		if(!isset($_SESSION['cart'][$id]))
			$_SESSION['cart'][$id]=1;
		else
			$_SESSION['cart'][$id]+=$qty;

		$_SESSION['remark'][$id]=$remark;
	}

	function update_cart_qty($id, $qty)
	{
		$_SESSION['cart'][$id]=$qty;
		$qty = item_qty();
		echo json_encode(array("qty" => $qty));
	}

	function update_cart_remark($id, $remark)
	{
		$_SESSION['remark'][$id]=$remark;
	}

	function delete_order($id)
	{
		global $conn;

		unset($_SESSION['cart'][$id]);
		if(isset($_SESSION['remark'][$id]))
			unset($_SESSION['remark'][$id]);
	}

 ?>