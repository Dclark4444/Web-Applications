<?php
@session_start();

if ($_SESSION["authentication"] == "valid" && isset($_SESSION["currentID"])) {
	if (isset($_GET["message"])) $message=$_GET["message"];
	else
	{
		header("Location: index.html");
	}
	$id = $_SESSION["currentID"];
	
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
	
	$sql = 'SELECT `imagePath` FROM `users` WHERE `id` = "'.$id.'";'; 
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()) {	
		$imagePath = $row["imagePath"];
	}
	
	$sql = 'SELECT `userN` FROM `users` WHERE `id` = "'.$id.'";'; 
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()) {	
		$userName = $row["userN"];
	}

	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO `chatv2Log` (`message`, `userName`, `imagePath`) VALUES ('".$message."', '".$userName."', '".$imagePath."');");
	$stmt->bind_param("s", $type);
	$name=strip_tags($type);
	// set parameters and execute
	$stmt->execute();




	//~ echo "New records created successfully";

	$stmt->close();
	$conn->close();
} else {
	header("Location: chatv2Login.php?null");	
}
?>
