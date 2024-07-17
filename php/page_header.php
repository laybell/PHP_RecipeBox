<?php 

//Generic page header for common pages
function pageheader() {
    echo '
    <nav class="nav-bar"> 
    <a href="http://localhost/recipe_box/index.php" alt="Home" target="" class="nav-text">Home </a>
    <a href="http://localhost/recipe_box/php/seasonal.php" alt="Seasonal" target="" class="nav-text">Seasonal </a>
    <a href="http://localhost/recipe_box/php/savoury.php" alt="Savoury" target="" class="nav-text">Savoury </a>
    <a href="http://localhost/recipe_box/php/sweet.php" alt="Sweet" target="" class="nav-text">Sweet </a>


    <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn"></button>
          <div id="myDropdown" class="dropdown-content dropdown-menu-left">
              <a href="http://localhost/recipe_box/sub-pages/createRecipe.html">Create a Recipe</a>
          </div>
    </div>
    </nav>
    ';
    $JS_location='http://localhost/recipe_box/index_files/example.js.download';
 
    echo'
    <script src="'.$JS_location.'"> 
    </script>


    <link rel="stylesheet" href="http://localhost/recipe_box/index_files/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="http://localhost/recipe_box/index_files/css2(1)" rel="stylesheet">
    <link href="http://localhost/recipe_box/ss/seasonal.css" rel="stylesheet">
    ';
}

?>
