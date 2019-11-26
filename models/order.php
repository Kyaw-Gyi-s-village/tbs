<?php 
	function create_order_from_buy_now( $item_id, $qty, $name, $phone, $address, $remark)
	{
		global $conn;
		$result = $conn->prepare("INSERT INTO orders (name, phone, address, remark, status, created_date, modified_date) VALUES (:name, :phone, :address, :remark, 0, now(), now())");
		$result->execute(array('name'=>$name, 'phone'=>$phone, 'address'=>$address, 'remark'=>$remark));
		$order_id = $conn->lastInsertId();

		$result1 = $conn->prepare("INSERT INTO order_items (qty, remark, item_id, order_id) VALUES (:qty, '', :item_id, :order_id)");
		$result1->execute(array('qty'=>$qty, 'item_id'=>$item_id, 'order_id'=>$order_id));
	}

	function create_order_from_cart( $name, $phone, $address, $remark )
	{
		global $conn;
		$result = $conn->prepare("INSERT INTO orders (name, phone, address, remark, status, created_date, modified_date) VALUES (:name, :phone, :address, :remark, 0, now(), now())");
		$result->execute(array('name'=>$name, 'phone'=>$phone, 'address'=>$address, 'remark'=>$remark));
		$order_id = $conn->lastInsertId();

		foreach($_SESSION['cart'] as $id => $qty){
			$remarkstr=""; 
			if(isset($_SESSION['remark']))
			{
				foreach($_SESSION['remark'] as $remark_id => $remark)
				{
					if($remark_id == $id)
						$remarkstr = $remark;
				}
			}

			$result2 = $conn->prepare("INSERT INTO order_items (qty, remark, item_id, order_id) VALUES (:qty, :remarkstr, :id, :order_id)");
			$result2->execute(array('qty'=>$qty, 'remarkstr'=>$remarkstr, 'id'=>$id, 'order_id'=>$order_id));
		}
		unset($_SESSION['cart']);
		unset($_SESSION['remark']);
	}

 ?>