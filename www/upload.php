<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

$servername = "localhost";
$username = "clarkd22";
$password = "Jackel121";
$dbname = "clarkd22";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  header("Location: chatv2Login.php");
}

$sql = 'SELECT COUNT(*) `id` FROM `users` WHERE `userN` = "'.$user.'";'; 
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {	
	$return = $row["id"];
}

if (empty($return) == False) { 
	header("Location: newUser.php?error=True");
}

if (basename($_FILES["fileToUpload"]["name"]) != NULL) {
	$target_dir = "userProfiles/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	  } else {
		echo "File is not an image.";
		$uploadOk = 0;
	  }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	  echo "file already exists.";
	  $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "File was not uploaded.";
	  header("Location: newUser.php?error=True");
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

		$finalFile = $target_dir.htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
		
		$sql = 'INSERT INTO `users`(`userN`, `passW`, `imagePath`) VALUES ("'.$user.'","'.$pass.'","'.$finalFile.'");'; 
		$result = $conn->query($sql);
		
		
		header("Location: validate.php?user=".$user."&pass=".$pass);
	  } else {
		echo "There was an error uploading the file.";
		header("Location: newUser.php?error=True");
	  }
	}

} else {
	$finalFile = "userProfiles/default.png";
	
	$sql = 'INSERT INTO `users`(`userN`, `passW`, `imagePath`) VALUES ("'.$user.'","'.$pass.'","'.$finalFile.'");'; 
	$result = $conn->query($sql);
	
	header("Location: validate.php?user=".$user."&pass=".$pass);
}



?>
