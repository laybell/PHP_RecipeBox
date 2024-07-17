<?php 	
require("constants.php");

$recipename = $_POST['recipename'];

//Create and connect to database
	$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if ($connection->connect_error) {
		die('Database connection failed: ' . mysqli_error());
	}
	else {
		$stmt= $connection->prepare("insert into recipes (recipename) values (?)");
		$stmt->bind_param("s", $recipename);
		$stmt->execute();
		echo "Recipe added";
		$stmt->close();
		$connection->close();

	}
	

?>