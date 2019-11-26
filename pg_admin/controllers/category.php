<?php 
switch($action)
{
	case "":
	case "list":
		show_list(); break;
	case "add":
		add_cat(); break;
	case "edit":
		edit_cat(); break;
	case "update_status":
		edit_status(); break;
	case "update_order": 
		edit_order(); break;
	case "del":
		remove_cat($id); break;
	default:
		exit("Unknown action");
}

function show_list()
{
	$pg_title = "Categories | The Best Shop";
	$cats = get_all_cats();
	render("category_list", $pg_title, $cats);
}

function add_cat()
{
	global $url;
	$name = $_POST['category_name'];
	insert_cat($name);
	header("location: $url/pg_admin/category/list/");
}

function edit_cat()
{
	global $url;
	$id = $_POST['id'];
	$category_name = $_POST['category_name'];
	update_cat($id, $category_name);

	header("location: $url/pg_admin/category/list/");
}

function edit_status()
{
	$id = $_POST['id'];
	$status = $_POST['status'];
	update_status($id, $status);
}

function edit_order()
{
	$id = $_POST['id'];
	$order_num = $_POST['order_num'];
	update_order($id, $order_num);
}

function remove_cat($id)
{
	global $url;
	delete_cat($id);
	header("location: $url/pg_admin/category/list/");
}

 ?>