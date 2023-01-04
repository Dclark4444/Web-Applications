<?php
@session_start();

if ($_SESSION["authentication"] == "valid" && isset($_SESSION["currentID"])) {
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

	$sql = "SELECT userName, message, time, imagePath FROM chatv2Log";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		echo '<img src="'.$row["imagePath"].'" alt="Profile Picture" width="50" height="50">';
		echo $row["userName"].": ".$row["message"]."<br>    ".$row["time"]."<br>"."<br><br>";
	}
} else {
	header("Location: chatv2Login.php?null");
}
?>

