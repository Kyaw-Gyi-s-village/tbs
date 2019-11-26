<?php 

	function get_lists()
	{
		global $conn;

		$deli_lists = $conn->query("SELECT * FROM delivery");
		
		return $deli_lists;
	}

	function create_deli($name, $states_and_regions, $price, $lead_time)
	{
		global $conn;

		$result = $conn->prepare("INSERT INTO delivery (name, states_and_regions, price, lead_time) VALUES (:name, :states_and_regions, :price, :lead_time)");
		$result->execute(array('name'=>$name, 'states_and_regions'=>$states_and_regions, 'price'=>$price, 'lead_time'=>$lead_time));
	}

	function update_deli($id, $name, $states_and_regions, $price, $lead_time)
	{
		global $conn;

		$result = $conn->prepare("UPDATE delivery SET name=:name, states_and_regions=:states_and_regions, price=:price, lead_time=:lead_time WHERE id=:id");
		$result->execute(array('name'=>$name, 'states_and_regions'=>$states_and_regions, 'price'=>$price, 'lead_time'=>$lead_time, 'id'=>$id));
	}

	function delete_deli($id)
	{
		global $conn;

		$result = $conn->prepare("DELETE FROM delivery WHERE id=:id");
		$result->execute(array('id'=>$id));
	}

 ?>