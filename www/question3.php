<?php
session_start()
?>

<!DOCTYPE html>

<?php
if (isset($_SESSION["answer2"]) != TRUE) {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>Woah attention everyone we got a cheater!</b></center></head>";
	echo "<body>I bet your mom is real proud of you. Get out of here.</body>";
	echo "</body></html>";
} elseif ($_SESSION["answer2"] != "snorewinkle") {
	echo '<html lang="en" style="background-color:red";>';
	echo "<head><center><b>Woah attention everyone we got a cheater!</b></center></head>";
	echo "<body>I bet your mom is real proud of you. Go get the right answer!</body>";
	echo "</body></html>";
} else {
	echo '<html lang="en" style="background-color:DodgerBlue";>';
	echo "<head><center><b>Question 3</b></center></head><body>";
	echo "<p>This is slide puzzle, group each color into a vertical line on the order of blue, green, and red. Note there is only two blue pieces.</p>";
	echo "<p>The white square is the space that squares can switch into. If you request an impossible command, it will not happen.</p><br>";
	
	$uri = $_SERVER['REQUEST_URI'];
	$url_components = parse_url($uri);
	parse_str($url_components['query'], $params);

	#Set the puzzle array if not already done and moving the array
	if(isset($_SESSION["aquired"]) != TRUE) {
		$_SESSION["aquired"] = TRUE;
		$_SESSION["row1"] = ['R', 'B', 'G'];
		$_SESSION["row2"] = ['R', 'R', 'G'];
		$_SESSION["row3"] = ['B', 'G', 'SPACE'];
		
	}
	else {

		$command = $params['command'];
		$rows = [$_SESSION["row1"], $_SESSION["row2"], $_SESSION["row3"]];
		
		$commandRan = FALSE;
		for ($i = 0; $i < 3; $i++) {
			for ($j = 0; $j < 3; $j++) {
				if ($command != "null") {
					if ($command == "left" and $j-1 > -1 and $rows[$i][$j] == "SPACE" and $commandRan != True) {
						$temp = $rows[$i][$j-1];
						$rows[$i][$j-1] = $rows[$i][$j];
						$rows[$i][$j] = $temp;
						$commandRan = True;
						
					}
					if ($command == "right" and $j+1 < 3 and $rows[$i][$j] == "SPACE" and $commandRan != True) {
						$temp = $rows[$i][$j+1];
						$rows[$i][$j+1] = $rows[$i][$j];
						$rows[$i][$j] = $temp;
						$commandRan = True;
						
					}
					if ($command == "up" and $i-1 > -1 and $rows[$i][$j] == "SPACE" and $commandRan != True) {
						$temp = $rows[$i-1][$j];
						$rows[$i-1][$j] = $rows[$i][$j];
						$rows[$i][$j] = $temp;
						$commandRan = True;
					}
					if ($command == "down" and $i+1 < 3 and $rows[$i][$j] == "SPACE" and $commandRan != True) {
						$temp = $rows[$i+1][$j];
						$rows[$i+1][$j] = $rows[$i][$j];
						$rows[$i][$j] = $temp;
						$commandRan = True;
					}
					
				}
			}
		}
		
	$_SESSION["row1"] = $rows[0];
	$_SESSION["row2"] = $rows[1];
	$_SESSION["row3"] = $rows[2];

	}
	
	#Displaying the puzzle
	$rows = [$_SESSION["row1"], $_SESSION["row2"], $_SESSION["row3"]];
	for ($i = 0; $i < 3; $i++) {
		for ($j = 0; $j < 3; $j++) {
			if ($rows[$i][$j] == "R") {
				$img = 'images/red.png';
			} elseif ($rows[$i][$j] == "B") {
				$img = 'images/blue.png';
			} elseif ($rows[$i][$j] == "G") {
				$img = 'images/green.png';
			} else {
				$img = 'images/white.png';
			}
			echo "<img src=$img alt='Puzzle piece' width='241' height='250'>";
		}
		echo "<br>";
	}
	
	#Controls to move the puzzle
	echo "<a href='question3.php?command=left'>Move left</a>";
	echo "	";
	echo "<a href='question3.php?command=right'>Move right</a><br>";
	echo "<a href='question3.php?command=up'>Move up</a>";
	echo "	";
	echo "<a href='question3.php?command=down'>Move down</a><br>";
	
	#Check if the puzzle is solved and state it
	if (
	$_SESSION["row1"] == ['B', 'G', 'R'] OR $_SESSION["row1"] == ['SPACE', 'G', 'R'] AND
	$_SESSION["row2"] == ['B', 'G', 'R'] AND
	$_SESSION["row3"] == ['SPACE', 'G', 'R'] OR $_SESSION["row3"] == ['B', 'G', 'R']
	) {
		$_SESSION["answer3"] = "solvedThePuzzleFinally";
		echo "Nice you completed the puzzle!<br>";
		echo "<a href='reward.php?restart=FALSE'>You are a winner!</a><br>";
		
	}
	echo "</body></html>";
}
?>
