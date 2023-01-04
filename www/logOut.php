<?php
@session_start();

$_SESSION["authentication"] = "";
$_SESSION["id"] = "";

header("Location: chatv2Login.php?null");

?>
