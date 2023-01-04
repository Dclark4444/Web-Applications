<?php
if(isset($_COOKIE["authentication"])){
    $_COOKIE["authentication"];
    if ($_COOKIE["authentication"] == "True") {
        echo "FLAG{I_think_he's_a_squirrel?}";
    } else{
        echo "Woah we got a cheater get out of here! You hecking cheater you!";
    }
}
else{
    echo "Woah we got a cheater get out of here! You hecking cheater you!";
}
?>

