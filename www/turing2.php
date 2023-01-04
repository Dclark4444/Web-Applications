<?php
session_start()
?>

<!DOCTYPE html>

<?php
if (isset($_SESSION["test1"]) != TRUE) {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>ROBOT DETECTED ROBOT DETECTED</b></center></head>";
	echo "<body></body></html>";
} else {
?>


<html lang="en" style="background-color:DodgerBlue;">
<head><center><b>Turing Test</b></center>

</head>
<br>
<body>
	
<p>Great, what a very non robotic name. Get it? Because you're a robot? No you probably don't because you can't feel emotion. Leading me, a human, to the first question
write a paragraph of something really funny.</p>
<br>
Write something funny:
<br>

<form name="test" action="" method="">
<input type="text" name="t1"><br>
<input type="submit" name="s">
</form><br>

<?php

$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

$funny = $params['t1'];
$submitted = $params['s'];
	
if ($submitted == "Submit" && $funny != "") {
	$listOfEmotions = ['absurd', 'amusing', 'droll', 'entertaining', 'hilarious', 'ludicrous', 'playful', 'ridiculous', 'silly', 'whimsical', 'antic', 'jolly', 'killing', 'rich', 'riot', 'screaming', 'slapstick', 'blithe', 'capricious', 'clever', 'diverting', 'facetious', 'farcical', 'for grins', 'gelastic', 'good-humored', 'hysterical', 'jocose', 'jocular', 'joking', 'knee-slapper', 'laughable', 'merry', 'mirthful', 'priceless', 'riotous'];
	$funny = explode(" ", str_replace(".", "", $funny));
	
	$score = 1;
	foreach ($funny as $x) {
		if (in_array($x, $listOfEmotions)) {
			$score = $score+1;
		}
	}

	$score = $score/count($funny);
	
	$_SESSION["test2"] = $score;
	header("Location: turing3.php?t1=False&s=False");
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
