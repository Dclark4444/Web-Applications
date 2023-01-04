<?php
session_start()
?>

<!DOCTYPE html>

<?php
if (isset($_SESSION["test2"]) != TRUE) {
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
	
<p>That was easy because I am mega funny. Now write about something displaying romantic love. I'm gonna write about my night in Peru.</p>
<br>
Write something lovely:
<br>

<form name="test" action="" method="">
<input type="text" name="t1"><br>
<input type="submit" name="s">
</form><br>

<?php

$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

$love = $params['t1'];
$submitted = $params['s'];
	
if ($submitted == "Submit" && $love != "") {
	
	$listOfEmotions = ['affection', 'appreciation', 'devotion', 'emotion', 'fondness', 'friendship', 'infatuation', 'lust', 'passion', 'respect', 'tenderness', 'yearning', 'adulation', 'allegiance', 'amity', 'amorousness', 'amour', 'ardor', 'attachment', 'case', 'cherishing', 'crush', 'delight', 'devotedness', 'enchantment', 'enjoyment', 'fervor', 'fidelity', 'flame', 'hankering', 'idolatry', 'inclination', 'involvement', 'like', 'partiality', 'piety', 'rapture', 'regard', 'relish', 'sentiment', 'weakness', 'worship', 'zeal', 'ardency', 'mad for', 'soft spot'];
	$love = explode(" ", str_replace(".", "", $love));
	
	$score = 1;
	foreach ($love as $x) {
		if (in_array($x, $listOfEmotions)) {
			$score = $score+1;
		}
	}

	$score = $score/count($love);
	
	$_SESSION["test3"] = $score;
	header("Location: turing4.php?t1=False&s=False");
}

?>

</body>
</html>

<?php
}
?>
