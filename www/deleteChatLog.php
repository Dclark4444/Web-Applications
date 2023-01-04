<?php
if(isset($_GET["id"])) $id=$_GET["id"];
else
{
    header("Location: index.html");
}

$servername = "localhost";
$username = "clarkd22";
$password = "Jackel121";
$dbname = "clarkd22";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 
// prepare and bind
$stmt = $conn->prepare("DELETE FROM `chatLog` WHERE `id`=('".$id."');");
// set parameters and execute
$stmt->execute();
}

$stmt->close();
$conn->close();
?>

 
