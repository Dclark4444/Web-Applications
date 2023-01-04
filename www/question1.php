<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en" style="background-color:DodgerBlue;">
<head><center><b>Question 1</b></center></head>
<body>
What is Seward's favorite son?<br>
<form name="form1" action="" method="">
	<input type="text" name="t1"><br>
	<input type="submit" name="s">
</form><br>

<?php
$answer = "trey";

$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

$userInput = $params['t1'];
$submitted = $params['s'];

if (strtolower($userInput) == $answer and $submitted == "Submit") {
	$_SESSION["answer1"] = $answer;
	echo "Nice job! I wonder if this answer makes him uncomfortable.<br>";
	echo "<a href='question2.php?t1=null&s=null'>Here is the next puzzle</a><br>";
}
elseif ($submitted == "Submit" and $userInput != "") {
	echo "Woah! No. I think the answer is pretty obivous. Notice I said son so his actual kid was excluded from the question.<br>";
} else {
	echo "Go on. Type your answer.";
}
?>

</body>
</html>
