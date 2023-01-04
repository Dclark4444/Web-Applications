<?php
@session_start();

if ($_SESSION["authentication"] == "valid" && isset($_SESSION["currentUser"])) {
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

	$sql = "SELECT `user`, `score`, `time` FROM scores ORDER BY `score` ASC";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		echo $row["user"].": ".$row["score"]."<br>    ".$row["time"]."<br>"."<br><br>";
	}
} else {
	header("Location: login.html");
}
?>
