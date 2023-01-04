<?php

$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

if (isset($params['error'])) {
	echo '<p class="ui">There was an error creating your user profile. Your username may already be taken or you may of uploaded a not accepted image type. Please retry.</p><br>';
}
?>

<!DOCTYPE html>
<html lang="en" style="background-color:DodgerBlue;">

<head>
	
<style>
.title{
	font-family: "Comic Sans MS", "Comic Sans", cursive;
	font-size: 36px;
}
.ui {
	font-family: 'Helvetica', 'Arial', sans-serif;
	color: #444444;
    font-size: 14pt;
    background-color: #FAFAFA;
}
</style>

<center><b class="title">Create Your Account</b></center>

</head>
<body>
  
<form action="upload.php" method="post" enctype="multipart/form-data">
  <p class="ui">Username:</p><br>
  <input type="text" id="user" class="ui" name="user"><br>
  <br>
  <p class="ui">Password:</p><br>
  <input type="password" id="pass" class="ui" name="pass"><br>
  <br>
  <p class="ui">Select image to upload:</p>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Create User" name="submit">
</form>
<br>

</body>
</html>
