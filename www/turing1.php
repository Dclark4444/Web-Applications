<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en" style="background-color:DodgerBlue;">
<head><center><b>Turing Test</b></center></head>
<br>
<body>
<p>Welcome to the Turing test! If you're a robot (which I suspect you are) then there is no way you can answer these questions; in fact, you're
probably not even reading this if you are. How this is gonna work is you are gonna answer a series of questions regarding emotions (a human thing) 
and I (a human) are going to answer the same questions. At the end of the test another human will analyze the answers and pick which one had the 
most human responses. 
For your first test put your name. All humans have names and so should you.</p>
<br>
What is your name?
<br>

<form name="name" action="" method="">
<input type="text" name="t1"><br>
<input type="submit" name="s">
</form><br>

<?php

$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

$name = $params['t1'];
$submitted = $params['s'];
	
if ($submitted == "Submit" && $name != "") {
	$_SESSION["test1"] = $name;
	header("Location: turing2.php?t1=False&s=False");
}
else {
	echo "Sorry you need to type something.<br>";
}

?>

</body>
</html>

