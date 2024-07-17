<?php
//This file is the place to store all basic functions


	function confirm_query($result_set){
			if (!$result_set){
				die("Database query failed : ".mysqli_error());
	}}
		
	function get_all_recipes(){
		global $connection;
				$query = "SELECT*
					FROM recipes 
					ORDER BY position ASC";
		$recipes_set = mysqli_query ($connection,$query);
		confirm_query($recipes_set);
		return $recipes_set;
	}
	?>