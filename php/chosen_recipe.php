<?php 
require("includes/constants.php");
include ('page_header.php');


//Connect to db
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($connection->connect_error) {
    die('Database connection failed: ' . mysqli_error());
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    </head>
    <body>
    <header></header>

<?php
//generic header nav bar  and dropdowns
pageheader();
?>


<div class="central-area">
<?php 

        $recipe_title= $_POST['recipe_title'];
        $recipe_title = htmlspecialchars($recipe_title); 
	    $recipe_title= mysqli_real_escape_string($connection,$recipe_title);
 ?>
    <div style = "font-family:Trebuchet MS" class="LHS">
        <h1>
            <div style="   box-shadow: 0 4px 2px 0 rgba(0, 0, 0, 0.2);"class="title-end">
            <?php echo $recipe_title?>.
               </div> </h1>

        
<?php

//DISPLAYING IMAGES
$query="SELECT * FROM images WHERE file_name LIKE '%$recipe_title%' ORDER BY uploaded_on DESC LIMIT 1";

$results=mysqli_query($connection, $query);
while($row=mysqli_fetch_array($results)){
    $imageURL = 'uploads/'.$row['file_name'];
    echo " <img 
    style='width:40%; 
    height:auto;
    float:right;
    margin: 25px 50px 75px 100px;
    box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2);
    border: solid 4px #D3D3D3;

    '
    src='".$imageURL."'alt='' />";
}

echo '</br> ';
$rowcount=mysqli_num_rows($results);
if (($rowcount)<1){
    echo '
    <div 
    style="width:30%; 
    height:auto-adjust;
    float:right;
    margin: 25px 50px 75px 100px;
    box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2);
    border: solid 4px #D3D3D3;
    display: flex;
    align-items: center;
    justify-content: center;
    ">
    <form action="../php/upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
    </form>
    </div>
    ';
}

//Searches for recipe components and displays them
$query="SELECT * FROM recipes WHERE recipename='".$recipe_title."'";
$results=mysqli_query($connection, $query);

?>
<h3 style="font-size: 2.5vw; margin-top:-1%;"> Ingredients: </h3>
<div class=ingredients 
style='
margin-left:5%;
font-size: 2vw;

'> <?php


while ($row = mysqli_fetch_array($results)){
    $ingredients= $row['ingredients'];
    $ingredients=explode(",", $ingredients);

    foreach($ingredients as $ing){
        echo "<li>".$ing."</li>";
    }
    echo '</div></br>'; 
    echo '<h3 style="
    font-size: 2.5vw;"> Method: </h3>';

    //Separate each entry of method based on # symbol
    $method=explode("#", $row['method']);

    echo '<ol style="
    font-size: 2vw;"
    type="1">';

    foreach ($method as $bullet){
        echo "<li>".$bullet."</li></br>";
    };
    echo '</ol>';
}
?>
</div>

