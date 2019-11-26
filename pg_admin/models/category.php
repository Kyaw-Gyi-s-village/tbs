<?php
#create new category in categories table
	function insert_cat($name)
	{
		global $conn;
		$result = $conn->prepare("INSERT INTO categories (category_name, status, order_num) VALUES(:name, 1, 0)");
		$result->execute(array('name'=>$name));
	}

#edit only category name by its id from categories table
	function update_cat($id, $category_name)
	{
		global $conn;
		$result = $conn->prepare("UPDATE categories SET category_name=:category_name WHERE id=:id");
		$result->execute(array('category_name'=>$category_name, 'id'=>$id));
	}

#edit category status by its id from categories table
	function update_status($id, $status)
	{
		global $conn;
		$result = $conn->prepare("UPDATE categories SET status=:status WHERE id=:id");
		$result->execute(array('status'=>$status, 'id'=>$id));
	}

#edit category order number by its id from categories table
	function update_order($id, $order_num)
	{
		global $conn;
		$result = $conn->prepare("UPDATE categories SET order_num=:order_num WHERE id=:id");
		$result->execute(array('order_num'=>$order_num, 'id'=>$id));
	}

#delete one category by its id from categories table
	function delete_cat($id)
	{
		global $conn;
		$result = $conn->prepare("DELETE FROM categories WHERE id=:id");
		$result->execute(array('id'=>$id));
	}

 ?>