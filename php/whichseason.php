<?php 

$dt = date("m");

if ($dt < 4) {
    $season =("Winter");
}
elseif ($dt < 7) {
    $season =("Spring");
}
elseif ($dt < 11) {
    $season =("Summer");
}
else{
    $season =("Autumn");
}

?>
