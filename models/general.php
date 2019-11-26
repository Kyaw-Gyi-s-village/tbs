<?php
#get delivery list
	function get_delis()
	{
		global $conn;
		return $conn->query("SELECT * FROM delivery");		
	}
 ?>
