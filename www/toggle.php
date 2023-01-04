<?php
$taskToDo="";
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
}

$sql = "SELECT `type` FROM `toDo` WHERE `id`=('".$id."');";
$result = $conn->query($sql);
$type = $result->fetch_assoc();

$type = array_values($type)[0];
if ($type == "done")
{
	$type = "notDone";
} else
{
	$type = "done";
}

// prepare and bind
$stmt = $conn->prepare("UPDATE `toDo` SET `type`=('".$type."')  WHERE `id`=('".$id."');");
// set parameters and execute
$stmt->execute();




//~ echo "New records created successfully";

$stmt->close();
$conn->close();

header("Location: toDo.php?name=null");

?>
