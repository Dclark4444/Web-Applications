<?php
@session_start();

if ($_SESSION["authentication"] == "valid" && isset($_SESSION["currentUser"])) {
	if (isset($_GET["score"])) $score=$_GET["score"];
	else
	{
		header("Location: login.php");
	}
	$user = $_SESSION["currentUser"];
	
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
	$stmt = $conn->prepare("INSERT INTO `scores` (`score`, `user`) VALUES ('".$score."', '".$user."');");
	$stmt->bind_param("s", $type);
	$name=strip_tags($type);
	// set parameters and execute
	$stmt->execute();




	//~ echo "New records created successfully";

	$stmt->close();
	$conn->close();
} else {
	header("Location: login.php");	
}
?>
