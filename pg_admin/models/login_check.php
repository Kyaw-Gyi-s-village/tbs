<?php 
//check account
	function check_from_db($username, $password)
	{
		global $conn;
		$result = $conn->prepare("SELECT * FROM login WHERE username=:username AND password=:password");
		$result->execute(array('username'=>$username, 'password'=>$password));
		return $result->fetch();		
	}
//end of check account
//logout
	function unset_auth()
	{
		session_start();
		unset($_SESSION['auth']);
	}
//end of logout
 ?>