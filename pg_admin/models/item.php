<?php
#get items by category_id from items table
	function get_items($id)
	{
		return get_same_cat_items($id);
	}
	function get_item($id)
	{
		return get_one_item($id);
	}

#create item into item table
function insert_item($item_name, $item_code, $stock, $price, $discount_percent, $summary_zawgyi, $summary_unicode, $category_id, $photo_qty)
{
	global $conn;
	$result = $conn->prepare("INSERT INTO items (item_name, item_code, status, order_num, stock, price, discount_percent, summary_zawgyi, summary_unicode, category_id, photo_qty, created_date, modified_date) VALUES (:item_name, :item_code, 1, 0, :stock, :price, :discount_percent, :summary_zawgyi, :summary_unicode, :category_id, :photo_qty, now(), now())");
	$result->execute(array('item_name'=>$item_name, 'item_code'=>$item_code, 'stock'=>$stock, 'price'=>$price, 'discount_percent'=>$discount_percent, 'summary_zawgyi'=>$summary_zawgyi, 'summary_unicode'=>$summary_unicode, 'category_id'=>$category_id, 'photo_qty'=>$photo_qty));
	return $conn->lastInsertId();
}

#create item photo's name into item_photos
	function insert_photo($item_id, $name)
	{
		global $conn;
		$result = $conn->prepare("INSERT INTO item_photos (item_id, name) VALUES(:item_id, :name)");
		$result->execute(array('item_id'=>$item_id, 'name'=>$name));
	}

#read item photo's name into item_photos
	function get_photo($item_id)
	{
		global $conn;
		$result = $conn->prepare("SELECT * FROM item_photos WHERE item_id=:item_id");
		$result->execute(array('item_id'=>$item_id));
		$names = array();
		while($row = $result->fetch())
		{
			$names[] = $row;
		}
		return $names;
	}
#delete item photo's name into item_photos
	function delete_photo($id, $name)
	{
		global $conn;
		// $result = $conn->prepare("INSERT INTO item_photos (id, name) VALUES(:id, :name)");
		// $result->execute(array('id'=>$id, 'name'=>$name));
	}

#update photo qty by id form item table
	function update_qty($id, $photo_qty)
	{
		global $conn;
		$result = $conn->prepare("UPDATE items SET photo_qty=:photo_qty, modified_date=now() WHERE id=:id");
		$result->execute(array('id'=>$id, 'photo_qty'=>$photo_qty));
	}

#update all except photo qty by id from item _table
	function update_others($id, $item_name, $item_code, $stock, $price, $discount_percent, $summary_zawgyi, $summary_unicode, $category_id)
	{
		global $conn;
		$result = $conn->prepare("UPDATE items SET item_name=:item_name, item_code=:item_code, stock=:stock, price=:price, discount_percent=:discount_percent, summary_zawgyi=:summary_zawgyi, summary_unicode=:summary_unicode, category_id=:category_id, modified_date=now() WHERE id=:id");
		$result->execute(array('id'=>$id, 'item_name'=>$item_name, 'item_code'=>$item_code, 'stock'=>$stock, 'price'=>$price, 'discount_percent'=>$discount_percent, 'summary_zawgyi'=>$summary_zawgyi, 'summary_unicode'=>$summary_unicode, 'category_id'=>$category_id));
	}

#delete item by its id from item table
	function delete_id($id)
	{
		global $conn;

		$result = $conn->prepare("SELECT category_id FROM items WHERE id=:id");
		$result->execute(array('id'=>$id));
		$item = $result->fetch();

		$delete_item = $conn->prepare("DELETE FROM items WHERE id=:id");
		$delete_item->execute(array('id'=>$id));

		return $item['category_id'];
	}

 ?>
