<?php 
	switch($action){
		case "":
		case "list":
			show_list(); break;
		case "add_text":
			add_text(); break;
		case "edit_text":
			edit_text(); break;
		case "add_photo":
			add_photo(); break;
		case "delete_photo":
			remove_photo($id); break;
		default:
			exit("Unknow action");
	}

function show_list()
{
	$pg_title = "Promotion | The Best Shop";
	$promo_photos = get_photos();
	render("promo_list", $pg_title, $promo_photos);
}

function add_text()
{
	global $url;
	$promo_text = $_POST['promo_text'];
	insert_text($promo_text);
	header("location: $url/pg_admin/promo/list/");
}

function edit_text()
{
	global $url;
	$id = $_POST['id'];
	$promo_text = $_POST['promo_text'];
	update_text($id, $promo_text);
	header("location: $url/pg_admin/promo/list/");
}

function add_photo()
{
	global $url;
	$id = inserts_photo();
	$tmp = $_FILES['promo_photo']['tmp_name'];
	$photo_name = "pp$id";
	move_uploaded_file($tmp, "promo_photos/$photo_name.jpg");
	header("location: $url/pg_admin/promo/list/");
}

function remove_photo($id)
{
	global $url;
	delete_photo($id);
	header("location: $url/pg_admin/promo/list/");
}

 ?>