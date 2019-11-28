<?php
	switch($action){
		case '':
		case 'list':
			show_list($id); break;
		case 'add':
			add_item(); break;
		case 'edit_photos':
			edit_photos(); break;
		case 'edit_others':
			edit_others(); break;
		case 'del':
			remove_item($id); break;
		default:
			exit("Unknow action action");
	}

	function show_list($id)
	{
		$pg_title="Items | The Best Shop";
		$items = (($id == "") ? array() : get_items($id));
		render("item_list", $pg_title, $items, $id);
	}

	function add_item()
	{
		global $url;
		$item_name = $_POST['item_name'];
		$item_code = $_POST['item_code'];
		$stock = $_POST['stock'];
		$price = $_POST['price'];
		$discount_percent = $_POST['discount_percent'];
		$summary_zawgyi = $_POST['summary_zawgyi'];
		$summary_unicode = $_POST['summary_unicode'];
		$category_id = $_POST['category_id'];
		$photo_qty = $_POST['photo_qty'];

		$id = insert_item($item_name, $item_code, $stock, $price, $discount_percent, $summary_zawgyi, $summary_unicode, $category_id, $photo_qty);
		if($photo_qty > 0)
		{
			for($i=0; $i<$photo_qty; $i++)
			{
				$tmp = $_FILES["p$i"]['tmp_name'];
				$p_name = $_FILES["p$i"]['name'];
				move_uploaded_file($tmp, "item_gallary/".$item_code."_".$p_name);
				insert_photo($id, $item_code."_".$p_name);
			}
		}

		header("location: $url/pg_admin/item/list/$category_id");
	}

	function edit_photos()
	{
		global $url;
		$id = $_POST['id'];
		$photo_qty = $_POST['photo_qty'];
		$item = get_item($id);
		update_qty($id, $photo_qty);

		$photo_names = get_photo($id);
		$dir = 'item_gallary';
		$dirHandle = opendir($dir);
		foreach ($photo_names as $data) {
			while($file = readdir($dirHandle))
				if($file == $data['name'])
					unlink($dir."/".$file);
		}
		closedir($dirHandle);

		delete_photo($id);

		if($photo_qty > 0)
		{
			for($i=0; $i<$photo_qty; $i++)
			{
				$tmp = $_FILES["p$i"]['tmp_name'];
				$p_name = $_FILES["p$i"]['name'];
				move_uploaded_file($tmp, "item_gallary/".$item_code."_".$p_name);
				insert_photo($id, $item_code."_".$p_name);
			}
		}
		exit("Bug");
		$category_id = $item['category_id'];
		header("location: $url/pg_admin/item/list/$category_id");
	}

	function edit_others()
	{
		global $url;
		$id = $_POST['id'];
		$item_name = $_POST['item_name'];
		$item_code = $_POST['item_code'];
		$stock = $_POST['stock'];
		$price = $_POST['price'];
		$discount_percent = $_POST['discount_percent'];
		$summary_zawgyi = $_POST['summary_zawgyi'];
		$summary_unicode = $_POST['summary_unicode'];
		$category_id = $_POST['category_id'];
		update_others($id, $item_name, $item_code, $stock, $price, $discount_percent, $summary_zawgyi, $summary_unicode, $category_id);

		header("location: $url/pg_admin/item/list/$category_id");
	}

	function remove_item($id)
	{
		global $url;
		$item = get_item($id);
		$photo_names = get_photo($id);
		$dir = 'item_gallary';

		$dirHandle = opendir($dir);
		foreach ($photo_names as $data) {
			while($file = readdir($dirHandle))
			{
				if($file === $data['name'])
					unlink($dir."/".$file);
			}
		}
		closedir($dirHandle);

		exit("Bug");
		delete_photo($id);
		$category_id = delete_id($id);
		header("location: $url/pg_admin/item/list/$category_id");
	}

 ?>
