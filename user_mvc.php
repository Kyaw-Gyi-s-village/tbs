<?php
	session_start();
	include('pg_admin/confs/url.php');
	include('pg_admin/confs/db_connect_confs.php');
#Setting URL Variables
	$controller = $_GET['controller'];
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	$id = isset($_GET['id']) ? $_GET['id'] : "";

	if($controller == "item")
		include('pg_admin/models/promo.php');
	elseif($controller == "general" OR $controller == 'cart')
		include('models/item.php');

#Render view function
	function render($template, $pg_title='The Best Shop', $data=array()) 
	{
		global $controller;
		$view_file = "views/${controller}/${template}.php";
		if(file_exists($view_file) and !is_dir($view_file))
		{
			include('index.php');
		}
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