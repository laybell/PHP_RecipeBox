<html>
	<head>
		<title> Title Page</title>
		
	</head>
	<body>

<?php
 echo htmlspecialchars($_SERVER["PHP_SELF"]);
 ?>

<?php
// define variables and set to empty values
$recipesearch = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $recipesearch = test_input($_POST["recipesearch"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
	</body>
</html>