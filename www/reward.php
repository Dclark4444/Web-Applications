<?php
session_start();

if (isset($_SESSION["answer3"]) != TRUE) {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>Woah attention everyone we got a cheater!</b></center></head>";
	echo "<body>I bet your mom is real proud of you. Get out of here.</body>";
	echo "</body></html>";
} elseif ($_SESSION["answer3"] != "solvedThePuzzleFinally") {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>Woah attention everyone we got a cheater!</b></center></head>";
	echo "<body>I bet your mom is real proud of you. Go get the right answer!</body>";
	echo "</body></html>";
}
else {
	
	$uri = $_SERVER['REQUEST_URI'];
	$url_components = parse_url($uri);
	parse_str($url_components['query'], $params);
	
	$restart = $params['restart'];
	
	if ($restart == "TRUE") {
		$_SESSION["aquired"] = FALSE;
		$_SESSION["answer1"] = "";
		$_SESSION["answer2"] = "";
		$_SESSION["answer3"] = "";
		
		header("Location: question1.php?t1=null&s=null");
		exit;
	} else {
		echo '<!DOCTYPE html>';
		echo '<html lang="en" style="background-color:DodgerBlue;">';
		echo '<meta charset="utf-8"/>';
		echo '<title><head><b>Good Job!</b></head></title>';
		echo '<body>';
		echo '<h1>Here is your reward!</h1>';
		echo '<img src="images/reward.png" alt="Reward" width="1000" height="1000"><br>';
		echo '<a href="reward.php?restart=TRUE">Want to restart for some reason?</a><br>';
		echo '</body>';
		echo '</html>';
	}
}
?>
