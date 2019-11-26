<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		$permission = 0;
		login_pg_render("You need to Login!!!" );
	}
	else $permission = 1;
 ?>