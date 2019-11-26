<?php	
#Setting URL Variables
	$controller = $_GET['controller'];
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	$id = isset($_GET['id']) ? $_GET['id'] : "";

	include('confs/url.php');

#authority_check session
	if($controller == "promo" OR $controller == "category" OR $controller == "item" OR $controller == "delivery" OR $controller == "login")
		include('confs/admin_full_authority_check.php');
	elseif($controller == "order")
		include('confs/admin_authority_check.php');

#Login page render function
	function login_pg_render($message)
	{
		include('login.php');
		exit();
	}
	
	include('confs/db_connect_confs.php');
	if($controller == "category")
		include('../models/item.php');
	elseif($controller == "item")
		include('../models/item.php');
	
#Render view function
	function render($template, $pg_title='SEA Trading Myanmar', $data=array(), $id="")
	{
		global $controller;
		$view_file = "views/${controller}/${template}.php";
		if(file_exists($view_file) and !is_dir($view_file))
			include('index.php');
		else
			exit("views Invalid Request");
	}

#Loading model
	$model_file = "models/${controller}.php";
	if(file_exists($model_file) and !is_dir($model_file))
		include( $model_file );
	else
		exit("models Invalid Request");

#Loading controller
	$controller_file = "controllers/${controller}.php";
	if(file_exists($controller_file) and !is_dir($controller_file))
		include( $controller_file );
	else
		exit("controllers Invalid Request");

 ?>