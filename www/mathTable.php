<!DOCTYPE html>
<html lang="en" style="background-color:DodgerBlue;">
<head></head>
<body>

<?php
@session_start();


$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

$command1 = $params['command1'];
$command2 = $params['command2'];
$col = $params['col'];
$row = $params['row'];

if ($command1 == "up"){
	echo "You chose to increase the number of columns. ";
	$col += 1;
} elseif ($command1 == "down") {
	echo "You chose to decrease the number of columns. ";
	$col -= 1;
} else {
	echo "No command for the columns were recieved. ";
}

if ($command2 == "up"){
	echo "You chose to increase the number of rows. ";
	$row += 1;
} elseif ($command2 == "down") {
	echo "You chose to decrease the number of rows. ";
	$row -= 1;
} else {
	echo "No command for the rows were recieved. ";
}

if ($row < 3){
	$row = 3;
} elseif ($col < 3) {
	$col = 3;
}

echo "The following table is: ".$row." by ".$col.".\n";
echo "The smallest the table can be is 3 by 3. \n";

$minusRowURL = "mathTable.php?command1=null&command2=down&row=".$row."&col=".$col;
$plusRowURL = "mathTable.php?command1=null&command2=up&row=".$row."&col=".$col;
$minusColURL = "mathTable.php?command1=down&command2=null&row=".$row."&col=".$col;
$plusColURL = "mathTable.php?command1=up&command2=null&row=".$row."&col=".$col;

echo "<br>";

echo "<table border =\"1\" style='border-collapse: collapse'>";
for ($i = 1; $i <= $row; $i++) {
	echo "<tr> \n";
	for ($j = 1; $j <= $col; $j++) {
		$p = $i * $j;
		echo"<td>$p</td> \n";
	}
	echo "</tr>";
}
echo "</table>";
?>

<br>

<a href="<?php echo $minusRowURL;?>">Subtract a row</a>
<a href="<?php echo $plusRowURL;?>">Add a row</a>
<a href="<?php echo $minusColURL;?>">Subtract a column</a>
<a href="<?php echo $plusColURL;?>">Add a column</a>

</body>
</html>
