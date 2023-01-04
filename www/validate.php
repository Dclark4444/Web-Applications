<?php
@session_start();

$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

$servername = "localhost";
$username = "clarkd22";
$password = "Jackel121";
$dbname = "clarkd22";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  header("Location: chatv2Login.php?error=True");
}

if($params['user'] != "" && $params['pass'] != ""){
	
	$user = $params['user'];
	$pass = $params['pass'];

	$sql = 'SELECT `id` FROM `users` WHERE `userN` = "'.$user.'" AND `passW` = "'.$pass.'";'; 
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()) {	
		$currentID = $row["id"];
	}
	
	if (empty($currentID)) {
		$_SESSION["authentication"] = "invalid";
		header("Location: chatv2Login.php?error=True");
	}
	else {
		$_SESSION["authentication"] = "valid";
		$_SESSION["currentID"] = $currentID;
		header("Location: chatv2.php");
	}
}
else {
	header("Location: chatv2Login.php?error=True");
}
?>
