<?php 
	session_start();
	if(!isset($_SESSION['auth']) OR $_SESSION['auth']!= 1){
		$message = "";
		$permission = 0;
		
		if(!isset($_SESSION['auth']))
			$message = "You need to Login!!!";
		else
			$message = "You don't have permission!!!";

		login_pg_render($message);
		
	}
	else $permission = 1;
 ?>