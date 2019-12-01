<?php
#read item photo's name into item_photos
	function get_item_photo($item_id)
	{
		global $conn;
		$result = $conn->prepare("SELECT * FROM item_photos WHERE item_id=:item_id");
		$result->execute(array('item_id'=>$item_id));
		return $result->fetch();
	}
#get order by id from orders table
	function get_order($id)
	{
		global $conn;

		$result = $conn->prepare("SELECT * FROM orders WHERE id=:id ORDER BY created_date DESC");
		$result->execute(array('id'=>$id));
		return $result->fetch();
	}

#get new orders where status is 0 from orders table
	function get_new_orders()
	{
		global $conn;
		return $conn->query("SELECT * FROM orders WHERE status = 0 ORDER BY created_date DESC");
	}

#get completed orders where status is 1 from orders table
	function get_completed_orders()
	{
		global $conn;
		return $conn->query("SELECT * FROM orders WHERE status = 1 ORDER BY created_date DESC");
	}

#get order_itmes from order_items table
	function get_order_items($id)
	{
		global $conn;
		$result = $conn->prepare("SELECT order_items.*, items.item_name, items.item_code, items.price, items.discount_percent FROM order_items LEFT JOIN items ON order_items.item_id = items.id WHERE order_items.order_id = :id");
		$result->execute(array('id'=>$id));

		$order_items = array();
		while($row = $result->fetch())
		{
			$order_items[] = $row;
		}

		return $order_items;
	}
#update status order by id from order_items table
	function update_status($id, $status)
	{
		global $conn;
		$result = $conn->prepare("UPDATE orders SET status=:status, modified_date=now() WHERE id=:id");
		$result->execute(array('status'=>$status, 'id'=>$id));
	}

 ?>
