<?php 
	switch($action)
	{
		case '':
		case 'list':
			list_deli(); break;
		case 'add':
			add_deli(); break;
		case 'edit':
			edit_deli();break;
		case 'del':
			remove_deli($id);break;
		default:
			exit("Unknown action");
	}

	function list_deli()
	{
		$pg_title = "Delivery | The Best Shop";
		$deli_lists = get_lists();
		render("delivery_list", $pg_title, $deli_lists);
	}

	function add_deli()
	{
		global $url;
		$name = $_POST['name'];
		$states_and_regions = $_POST['states_and_regions'];
		$price = $_POST['price'];
		$lead_time = $_POST['lead_time'];

		create_deli($name, $states_and_regions, $price, $lead_time);
		header("location: $url/pg_admin/delivery/list/");
	}

	function edit_deli()
	{
		global $url;
		$id = $_POST['id'];
		$name = $_POST['name'];
		$states_and_regions = $_POST['states_and_regions'];
		$price = $_POST['price'];
		$lead_time = $_POST['lead_time'];

		update_deli($id, $name, $states_and_regions, $price, $lead_time);
		header("location: $url/pg_admin/delivery/list/");
	}

	function remove_deli($id)
	{
		global $url;
		delete_deli($id);
		header("location: $url/pg_admin/delivery/list/");
	}

 ?>