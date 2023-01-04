<html>

<body>

<?php
$servername = "localhost";
$username = "clarkd22";
$password = "Jackel121";
$dbname = "clarkd22";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo "db connection failed";
}
else
{
    $sql = "SELECT * FROM toDo";
    $result = $conn->query($sql);

    while($row = $result -> fetch_assoc())
    {
        echo $row['ID']." ".$row['name']." <br>";
    }


    $conn->close();
}
?>

<form action="add.php" method="GET">
<input type="text" name="name" />
<input type="hidden" name="action" value="add" />
<input type="submit" />
</form>


</body>



</html>
