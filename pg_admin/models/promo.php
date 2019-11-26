<?php 
#get promotion text from promo_text table
	function get_text()
	{
		global $conn;
		return $conn->query("SELECT * FROM promo_text");
		
	}

#get promotion photos from promo_photos table
	function get_photos()
	{
		global $conn;
		return $conn->query("SELECT * FROM promo_photos");
		 
	}

#create promotion text into promo_text table
	function insert_text($promo_text)
	{
		global $conn;

		$result = $conn->prepare("INSERT INTO promo_text ( promo_text, created_date, modified_date) VALUES (:promo_text, now(), now())");
		$result->execute(array('promo_text'=>$promo_text));
	}

#update promotion text from promo_text
	function update_text($id, $promo_text)
	{
		global $conn;
		$result = $conn->prepare("UPDATE promo_text SET promo_text=:promo_text, modified_date=now() WHERE id=:id");
		$result->execute(array('promo_text'=>$promo_text, 'id'=>$id));
	}

#create promotion photo into promo_photo table
	function inserts_photo()
	{
		global $conn;
		$conn->query("INSERT INTO promo_photos ( created_date) VALUES (now())");
		return $conn->lastInsertId();
	}

#delete promotion photo by id from promo_photo tabe
	function delete_photo($id)
	{
		global $conn;
		$result = $conn->prepare("DELETE FROM promo_photos WHERE id=:id");
		$result->execute(array('id'=>$id));
	}

 ?>