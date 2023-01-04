<?php
if(isset($_GET["userName"])) $userName=$_GET["userName"];
else
{
    header("Location: index.html");
}
if (isset($_GET["message"])) $message=$_GET["message"];
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

// prepare and bind
$stmt = $conn->prepare("INSERT INTO `chatLog` (`userName`, `message`) VALUES ('".$userName."', '".$message."');");
$stmt->bind_param("s", $type);
$name=strip_tags($type);
// set parameters and execute
$stmt->execute();




//~ echo "New records created successfully";

$stmt->close();
$conn->close();
?>
