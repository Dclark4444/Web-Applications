<?php
session_start();
if (isset($_SESSION["test3"]) != TRUE) {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>ROBOT DETECTED ROBOT DETECTED</b></center></head>";
	echo "<body></body></html>";
} else {
?>



<!DOCTYPE html>
<html lang="en" style="background-color:DodgerBlue;">
<head><center><b>Turing Test</b></center></head>
<br>
<body>
	
<p>Welp I forgot how that night in Peru ended. I am now very sad. Thats a thing humans do. Now write about sad stuff. This is the last test then we can look 
at the results.</p>
<br>
Write something sad:
<br>

<form name="test" action="" method="">
<input type="text" name="t1"><br>
<input type="submit" name="s">
</form><br>

<?php

$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

$sad = $params['t1'];
$submitted = $params['s'];
	
if ($submitted == "Submit" && $sad != "") {
	
	$listOfEmotions = ['bitter', 'dismal', 'heartbroken', 'melancholy', 'mournful', 'pessimistic', 'somber', 'sorrowful', 'sorry', 'unhappy', 'wistful', 'bereaved', 'blue', 'cheerless', 'dejected', 'depressed', 'despairing', 'despondent', 'disconsolate', 'distressed', 'doleful', 'down', 'down in dumps', 'down in the mouth', 'downcast', 'forlorn', 'gloomy', 'glum', 'grief-stricken', 'grieved', 'heartsick', 'heavy-hearted', 'hurting', 'in doldrums', 'in grief', 'in the dumps', 'languishing', 'low', 'low-spirited', 'lugubrious', 'morbid', 'morose', 'not happy', 'out of sorts', 'pensive', 'sick at heart', 'troubled', 'weeping', 'woebegone'];
	
	$sad = explode(" ", str_replace(".", "", $sad));
	
	$score = 1;
	foreach ($sad as $x) {
		if (in_array($x, $listOfEmotions)) {
			$score = $score+1;
		}
	}

	$score = $score/count($sad);
	
	$_SESSION["test4"] = $score;
	header("Location: turingResults.php");
}
else {
	echo "Sorry you need to type something.<br>";
}

?>

</body>
</html>

<?php
}
?>
