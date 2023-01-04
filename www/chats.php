<?php

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

$sql = "SELECT id, userName, timeStamp, message FROM chatLog";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {	
	echo $row["userName"].": ".$row["message"]."<br>    ".$row["timeStamp"]."<br>"."<br>";
}
