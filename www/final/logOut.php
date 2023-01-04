<?php
@session_start();

$_SESSION["authentication"] = "";
$_SESSION["currenUser"] = "";

header("Location: login.php");

?>
