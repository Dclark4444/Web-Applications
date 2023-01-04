<html lang="en" style="background-color:DodgerBlue;">
<?php

$servername = "localhost";
$username = "clarkd22";
$password = "Jackel121";
$dbname = "clarkd22";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  header("Location: index.html");
}

$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

$name = $params['name'];

if(isset($params['add']))
{
	header("Location: add.php?name=".$name);
}

?>

	
<head>
</head>

<body>
	
<form name="form1" action="" method="">
<input type="text" name="name">
<input type="submit" name="add">
</form>

<div id="complete">
<center>Done</center>
<?php

$sql = 'SELECT * FROM `toDo` WHERE `type`="done"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  echo($row["name"]);
	  $id=$row["id"];
	  $del = "delete.php?id=".$id;
	  $tog = "toggle.php?id=".$id;
	  echo('
	  <a href="delete.php?id='.$id.'">🗑</a>
	  <a href="toggle.php?id='.$id.'">🦶</a><br>
	  ');
	 }
}

?>
</div>

<div id="incomplete">
<center>Not Done</center>
<?php

$sql = 'SELECT * FROM `toDo` WHERE `type`="notDone"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  echo($row["name"]);
	  $id=$row["id"];
	  $del = "delete.php?id=".$id;
	  $tog = "toggle.php?id=".$id;
	  echo('
	  <a href="delete.php?id='.$id.'">🗑</a>
	  <a href="toggle.php?id='.$id.'">🦶</a><br>
	  ');
	 }
}

?>

</div>

</body>


</html>
