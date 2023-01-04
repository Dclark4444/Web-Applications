<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if (isset($_SESSION["test4"]) != TRUE) {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>ROBOT DETECTED ROBOT DETECTED</b></center></head>";
	echo "<body></body></html>";
} else {
	$test1 = $_SESSION["test1"];
	$test2 = $_SESSION["test2"];
	$test3 = $_SESSION["test3"];
	$test4 = $_SESSION["test4"];
?>
<!DOCTYPE html>
<html lang="en" style="background-color:DodgerBlue;">
<head><center><b>Turing Test</b></center></head>
<br>
<body>
	
<p>Alright time to look at your results...<br>
Surveryer 1<br>
Funny: 0.99<br>
Love: 0.99<br>
Sad: 0.99</p><br>

Surveyer 2<br>
Funny: <?php echo($test2); ?><br>
Love: <?php echo($test3); ?><br>
Sad: <?php echo($test4); ?><br>
<br>
<?php
$pass=True;
if ($test2 < 1) {
	$pass=False;
}
if ($test3 < 1) {
	$pass=False;
}
if ($test4 < 1) {
	$pass=False;
}

if ($pass == True) {
	echo("FLAG{angy}");
} else {
	echo("Get out of here you stinky robot!!!!!");
	echo("Your sessions has been reset, go back to the first page if you want to restart");
	$_SESSION["test1"] = "";
	$_SESSION["test2"] = "";
	$_SESSION["test3"] = "";
	$_SESSION["test4"] = "";
}
}
?>
</body>
</html>

