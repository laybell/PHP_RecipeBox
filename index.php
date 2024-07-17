<?php
include ('./php/page_header.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252"
    ></head>
    <body>
        <header>  
        </header>

<?php
pageheader();
?>



<div class="central-area">
    <div class="LHS">
        <h1>All your favourite recipesss <br> at your fingertips. <br>
            <div class="title-end">
                Recipe Box.
            </div> 
        </h1>




        <div class="sticky dropdown">

            <div id="myDropdown2" class="dropdown-contents">
                <form action="php/search.php" method="POST"autocomplete="on">
                    <input type="text"
                    style="
                        padding: 6px 10px;
                        margin-top: 8px;
                        margin-right: 16px;
                        font-size: 17px;
                        border: none;
                        cursor: pointer; "
                    name="search_input" placeholder="Type here..." />
                    <input type="submit" 
                    style="
                        padding: 6px 10px;
                        margin-top: 8px;
                        margin-right: 16px;
                        font-size: 17px;
                        border: none;
                        cursor: pointer; "
                    value="Search" />
                </form>

            </div>

         </div>
    </div>

<img class="bowl" src="./index_files/background_index.jpg">

</div>









<footer id="footer"><br> Adding recipes since 2022. </footer>


</body>

</html>