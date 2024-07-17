<?php 
require("includes/constants.php");
include ('page_header.php');

//Create and connect to database
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($connection->connect_error) {                               
    die('Database connection failed: ' . mysqli_error());
}
else {
};
?>
<!-- SEARCH FOR ALL RECIPES -->

<!-- Here need to insert while loop going through the list of
recipenames where dish_type = savoury and lists each one in the anchor tags-->
<?php
$sav_rec = array();


echo ('
<!DOCTYPE html>
<html>
	<head>
		<title> Search Recipes </title>
<body>
  <link rel="stylesheet" href="styles_search_page.css">
  <script src="../js/myScript.js"></script>

';
pageheader();
echo'
<div class="central-area">
    <div class = "LHS">
        <h1>Search your Favourite Recipes  </br>  </br>
            <div class="title-end" >Recipe Box.</div> </h1>

');
echo('<br/>

<div class="sticky dropdown">

    <div id="myDropdown2" class="dropdown-contents">
    <form action="search.php" method="POST">
    <input type="text" name="search_input" placeholder="Type here..." />
    <input type="submit" value="Search" />
  </form>

     ');

    
    ?>
     </div>

     </div>


</div><!-- LHS class -->


<img class= "bowl" src="../images/background_index.jpg" >

</div> <!-- close central class -->

<head>
    <script src="../js/example.js" > console.log("hello")
    </script>

<link rel="stylesheet" href="../stylesheets/styles.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&family=Permanent+Marker&family=Sarabun:ital,wght@1,300&display=swap" rel="stylesheet">

</head>

</br>
</br>
</br>


</div>
</div>
</div>
</div>

<footer>
  <a href="#Mushroom Bao">Mushroom Bao</a>
  <a href="#blog">Blog</a>
  <a href="#custom">Custom</a>
  <a href="#support">Support</a>
  <a href="#tools">Tools2</a>
</footer>

<?php	





