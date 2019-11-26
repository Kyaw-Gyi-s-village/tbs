<?php 
	switch($action)
	{
		case 'show':
			show_account(); break;
		case 'add':
			add_account(); break;
		case "update_permission":
			edit_permission();break;
		case 'remove':
			remove_account($id);break;
		default:
			exit("Unknow action");
	}

	function show_account()
	{
		$pg_title = "Login | The Best Shop";
		$accounts = get_accounts();
		render("account_list", $pg_title, $accounts);
	}

	function add_account()
	{
		global $url;
		$username = strip_tags($_POST['username']);
		$password = sha1($_POST['password']);
		insert_account($username, $password);
		header("location: $url/pg_admin/login/show");
	}

	function edit_permission()
	{
		$id = strip_tags($_POST['id']);
		$permission = strip_tags($_POST['permission']);
		update_permission($id, $permission);
	}

	function remove_account($id)
	{
		global $url;
		delete_account($id);
		header("location: $url/pg_admin/login/show");
	}



 ?>