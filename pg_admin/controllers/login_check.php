<?php
	switch ($action) {
		case 'check':
			check_account();break;
		case 'logout':
			logout_acc();break;
		default:
			exit("Unknown action");
	}
	
	function check_account()
	{
		global $url;
		$username = strip_tags($_POST['username']);
		$password = sha1($_POST['password']);
		$check = check_from_db($username, $password);
		session_start();
		if($check!=null)
		{
			if($check['permission'])
			{
				$_SESSION['auth']= 1;
				header("location: $url/pg_admin/category/list/");
			}
			else
			{
				$_SESSION['auth']= 0;
				header("location: $url/pg_admin/order/new_list/");
			}
			
		}
		else
		{
			login_pg_render("Sorry, Try again!!!" );
			$permission	= 0;
		}
	}

	function logout_acc()
	{
		global $url;
		unset_auth();		
		header("location: $url/pg_admin/");
	}

 ?>