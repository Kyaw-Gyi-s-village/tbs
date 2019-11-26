<?php 
//get accouts from login table
	function get_accounts()
	{
		global $conn;
		return $conn->query("SELECT * FROM login");
	}
//end of get accouts from login table

//create an account into login table
	function insert_account($username, $password)
	{
		global $conn;
		$result = $conn->prepare("INSERT INTO login (username, password, permission, created_date, modified_date) VALUES(:username, :password, 0, now(), now())");
		$result->execute(array('username'=>$username, 'password'=>$password));
	}
//end of create an account into login table

//delete account from login table
	function delete_account($id)
	{
		global $conn;
		$result = $conn->prepare("DELETE FROM login WHERE id=:id");
		$result->execute(array('id'=>$id));
	}
//end of delete account from login table

//update permission account from login table
	function update_permission($id, $permission)
	{
		global $conn;		
		$result = $conn->prepare("UPDATE login SET permission=:permission, modified_date=now() WHERE id=:id");
		$result->execute(array('permission'=>$permission, 'id'=>$id));
	}
//update permission account from login table
 ?>