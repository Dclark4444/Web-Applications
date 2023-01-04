<?php
session_start()
?>

<!DOCTYPE html>

<?php
if (isset($_SESSION["answer1"]) != TRUE) {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>Woah attention everyone we got a cheater!</b></center></head>";
	echo "<body>I bet your mom is real proud of you. Get out of here.</body>";
	echo "</body></html>";
} elseif ($_SESSION["answer1"] != "trey") {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>Woah attention everyone we got a cheater!</b></center></head>";
	echo "<body>I bet your mom is real proud of you. Go get the right answer!</body>";
	echo "</body></html>";
} else {
	echo '<html lang="en" style="background-color:DodgerBlue";>';
	echo '<head><center><b>Question 2</b></center></head>';
	echo "<body>";
	
	echo "What is Robert Boerwinkle's last name when he is sleepy?<br>";
	
	echo '<form name="form1" action="" method="">';
	echo '<input type="text" name="t1"><br>';
	echo '<input type="submit" name="s">';
	echo "</form><br>";

	$answer = "snorewinkle";
	
	$uri = $_SERVER['REQUEST_URI'];
	$url_components = parse_url($uri);
	parse_str($url_components['query'], $params);

	$userInput = $params['t1'];
	$submitted = $params['s'];

	if (strtolower($userInput) == $answer and $submitted == "Submit") {
		$_SESSION["answer2"] = $answer;
		echo "Nice job again! I am sure you will find this next one hard.<br>";
		echo "<a href='question3.php?command=null'>Here is the next puzzle</a><br>";
	}
	elseif ($submitted == "Submit" and $userInput != "") {
		echo "Have you ever been in a fifty foot radius of Bobert when he is asleep? Man snores a lot.<br>";
	}
	else {
		echo "Sorry you need to type something.<br>";
	
	
	
	
	
	echo "</body></html>";
	}
} 
?>
