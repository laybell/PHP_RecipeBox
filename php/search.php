<?php
include ('page_header.php');
?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></head><body><header></header>

<?php
pageheader();
?>

<div class="central-area">
    <div class="LHS">
        <h1>All your favourite recipes <br> at your fingertips. <br>
            <div class="title-end">Recipe Box.</div> </h1>

<div class="sticky dropdown">

<div id="myDropdown2" class="dropdown-contents">
    <form action="search.php" method="POST"autocomplete="on">
    <input type="text" style="
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
  border: none;
  cursor: pointer; " name="search_input" placeholder="Type here..." />
    <input type="submit" style="
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
  border: none;
  cursor: pointer; "value="Search" />
  </form>
</br>

<!-- START OF PHP CODE -->
<div class='search_results'>
  <?php require("includes/constants.php");

//Create and connect to database
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($connection->connect_error) {
    die('Database connection failed: ' . mysqli_error());
}

?>

<head>
	<title>Search</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<?php

    $style_search="font-size:90%; color:black; text-shadow:none; display:inline;";
    $style_result="font-size:2vw; color:black; text-shadow:none;";

	$search_input = mysqli_real_escape_string($connection,  $_POST['search_input']);           // gets value sent over search form
	echo '<h4 style= "'.$style_search.'" > Search Term: </h4> '.$search_input.'</p><h4 style="'.$style_result.'">Results: </h4>';
	$min_length = 3;                    // minimum length of the query 
	
	if(strlen($search_input) >= $min_length){ // if query length is more or equal minimum length then
		
		$search_input = htmlspecialchars($search_input); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$search_input = mysqli_real_escape_string($connection, $search_input);
		// makes sure nobody uses SQL injection
	

        $sav_rec = array();

        //Query based on users' search input
        $query= "SELECT `recipename` FROM `recipes` WHERE `recipename` LIKE '%".$search_input."%'" ;
        $result=mysqli_query($connection, $query);
		
				
        while(($row= mysqli_fetch_array($result))){
            $item = $row['recipename'];
            $sav_rec[] = $item;
            echo(' <p>
            <form action="chosen_recipe.php" method="post">
            <input type="submit" name="recipe_title" value="'.$item.'">
            </form>
            </p>
            ');
            
        }
	
		
	}
	else{ // if query length is less than minimum
		echo "<p>Your search is too short! </br>The minimum length is ".$min_length."</p>";
	}
?>


  
</div>
</div>
</div>
</div>

<img class="bowl" src="../images/background_index.jpg">

</div>

<footer id="footer"><br> Adding recipes since 2022. </footer>


</body></html>