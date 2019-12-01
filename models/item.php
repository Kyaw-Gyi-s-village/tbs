<?php
#read item photo's name into item_photos
	function get_item_photos($item_id)
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
#get all categories order by order-number
	function get_all_cats()
	{
		global $conn;
		return $conn->query("SELECT id, category_name, status FROM categories ORDER BY order_num");
	}
#get one category by id
	function get_one_cat($id)
	{
		global $conn;
		$result = $conn->prepare("SELECT category_name FROM categories WHERE id=:id");
		$result->execute(array('id'=>$id));
		return $result->fetch();
	}
#get all items order by order-number
	function get_all_items()
	{
		global $conn;
		/*return $conn->query("SELECT items.*, categories.category_name FROM items LEFT JOIN categories ON items.category_id=categories.id ORDER BY items.order_num");*/
		return $conn->query("SELECT * FROM items ORDER BY order_num");
	}

#get one item by id
	function get_one_item($id)
	{
		global $conn;
		$result = $conn->prepare("SELECT * FROM items WHERE id=:id");
		$result->execute(array('id'=>$id));
		return $result->fetch();
	}

#get same category items order by order-number
	function get_same_cat_items($id)
	{
		global $conn;
		$result = $conn->prepare("SELECT * FROM items WHERE category_id=:id ORDER BY order_num");
		$result->execute(array('id'=>$id));
		$items = array();
		while($row = $result->fetch())
		{
			$items[] = $row;
		}
		return $items;
	}

#get promo text
	function get_promo_text()
	{
		$result = get_text();
		return $result->fetch();
	}
#get promo photos
	function get_promo_photos()
	{
		return get_photos();
	}
?>
