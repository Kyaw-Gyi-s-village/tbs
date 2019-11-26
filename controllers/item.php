<?php
switch($action){
	case "":
	case "list":
		show_items_list(); break;
	case "item_same_cat_list":
		show_same_cat_list($id); break;
	case "detail":
		show_item_detail($id); break;
	default:
		exit("Invalid action!!!");
}

function show_items_list()
{
	$pg_title ='Products | The Best Shop';
	render("item_list", $pg_title);
}

function show_same_cat_list($id)
{
	$items = get_same_cat_items($id);
	$cat = get_one_cat($id);
	$pg_title ="${cat['category_name']} | The Best Shop";
	render("item_same_cat_list",$pg_title, $items);
}

function show_item_detail($id)
{
	$item = get_one_item($id);
	$pg_title = "The Best Shop";
	render("item_detail", $pg_title, $item);
}
?>