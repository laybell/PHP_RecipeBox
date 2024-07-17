<?php 
require("includes/constants.php");
require("whichseason.php");
include ('page_header.php');

?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></head><body><header></header>

<?php 
//generic header nav bar  and dropdowns
pageheader();
?>
    </script>
    <script src= "../js/whichseason.js?t=1682853320856 " ></script>


<div class="central-area">
    <div class="LHS">
        <h1>
            <?php echo 'Savoury Recipes'; ?>
        </h1>

     </div>
</div>




<?php 

if ($_POST) {
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
};

//Create and connect to database
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($connection->connect_error) {
    die('Database connection failed: ' . mysqli_error());
}

    $sql= "SELECT * FROM `recipes` WHERE dishtype='Savoury'";
    $result = $connection->query($sql);

    
    

    if ($result->num_rows > 0) {
        echo "<div class='thumbnails'>";
        // output data of each row
        while($row = $result->fetch_assoc()) {

            
            //DISPLAYING IMAGES
            $recipe_title=$connection->real_escape_string($row['recipename']);
            $recipe_titlejpg=$recipe_title.'.jpg';
            $query="SELECT * FROM images WHERE file_name LIKE '$recipe_titlejpg' ORDER BY uploaded_on DESC LIMIT 1";

            $results=mysqli_query($connection, $query);
            while($row=mysqli_fetch_array($results)){
                $imageURL = 'uploads/'.$row['file_name'];
                echo " 
                <form action='chosen_recipe.php' method='post'>
                <input type='hidden' name='recipe_title' value='$recipe_title'> 
                <input type='image'  
                class='thumbnail'
                src='$imageURL'alt='' 
                >
                </form>";
            }
            
            }
    } else {
        echo "0 results";
    }
    

?>
</div>

<footer id="footer"><br> Adding recipes since 2022. </footer>


</body>

</html>