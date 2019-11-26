<?php 
switch($action)
{
	case "list":
		show_list(); break;
	case 'add':
		increase_cart(); break;
	case "update_qty":
		edit_cart_qty(); break;
	case "update_remark":
		edit_cart_remark(); break;
	case "delete_order":
		remove_order($id); break;
	default:
		exit("Unknown action");
}

function show_list()
{	
	global $url;
	if(!isset($_SESSION['cart']) or $_SESSION['cart'] == null )
		header("location: $url");
	$pg_title = 'Cart List | SEA Trading Myanmar';
	render("cart_list", $pg_title);
}

function increase_cart()
{
	if(isset($_POST['quantity']))
	{
		global $url;
		$id = strip_tags($_POST['id']);
		$quantity = strip_tags($_POST['quantity']);
		$remark = strip_tags($_POST['remark']);
		add_carts($id, $quantity, $remarks);
		header("location: $url/");
	}
	else
	{
		add_cart($_POST['id']);
	}
}

function edit_cart_qty()
{
	$id = strip_tags($_POST['id']);
	$quantity = strip_tags($_POST['quantity']);
	update_cart_qty($id, $quantity);
}

function edit_cart_remark()
{
	$id = strip_tags($_POST['id']);
	$remark = strip_tags($_POST['remark']);
	update_cart_remark($id, $remark);
}

function remove_order($id)
{
	global $url;

	delete_order($id);
	if(!isset($_SESSION['cart']) or $_SESSION['cart'] == null)
		header("location: $url/");
	else
		header("location: $url/cart/list/");
}

 ?>