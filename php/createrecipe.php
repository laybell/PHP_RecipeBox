<?php 
require("includes/constants.php");


//Create and connect to database
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($connection->connect_error) {
    die('Database connection failed: ' . mysqli_error());
}
else {

  //clean POST data and assign variables
    $recipename = mysqli_real_escape_string($connection, $_POST['recipename']);
    $ingredients =mysqli_real_escape_string($connection,  $_POST['ingredients']);
    $preptime = mysqli_real_escape_string($connection, $_POST['preptime']);
    $cooktime =  mysqli_real_escape_string($connection, $_POST['cooktime']);
    $method =  mysqli_real_escape_string($connection, $_POST['method']);
    $difficulty =  mysqli_real_escape_string($connection, $_POST['difficulty']);
    $season =  mysqli_real_escape_string($connection, $_POST['season']);
    $dishtype =  mysqli_real_escape_string($connection, $_POST['dishtype']);
    $serving =  mysqli_real_escape_string($connection, $_POST['serving']);
    $costpp =  mysqli_real_escape_string($connection, $_POST['costpp']);
    $cuisine =  mysqli_real_escape_string($connection, $_POST['cuisine']);
    $source =  mysqli_real_escape_string($connection, $_POST['source']);

    //insert into db
    $stmt= $connection->prepare("insert into recipes (recipename, ingredients, preptime, cooktime, method, difficulty, season, dishtype,
    serving, costpp, cuisine, source) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $stmt->bind_param("ssiissssiiss", $recipename, $ingredients, $preptime, $cooktime, $method, $difficulty, $season, $dishtype, 
    $serving, $costpp, $cuisine, $source);
    $stmt->execute();
    echo "Recipe added";


    $stmt->close();
    $connection->close();

}

?>

<!-- Option for user to add image -->
<h2> 
  Would you like to add an image? 
</h2>
</br>
<form action="../php/upload.php" method="post" enctype="multipart/form-data">
  Select Image File to Upload:
  <input type="file" name="file">
  <input type="submit" name="submit" value="Upload">
</form>




