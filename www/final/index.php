<?php
@session_start();

if (isset($_SESSION["authentication"]) == "valid" && isset($_SESSION["currentUser"])) {
?>

<!DOCTYPE html>
<html lang="en" style="background-color:#A0A0A0 ;">
<head>
  <meta charset="UTF-8">
  <title>Good Ol' Mole Whacking</title>
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Short+Stack&display=swap');

    body {
      max-width: 1000px;
      margin: auto;
      padding: 1em;
      font-family: 'Short Stack', cursive;
      font-size: 2em;
    }

    @media only screen and (max-width: 600px) {
      body {
        font-size: 0.1em;
      }
    }

    h2 {
      margin-top: 2em;
    }
    
    .scoreBoard {
		overflow: auto;
		height: 800px;
		width: 250px;
		float: left;
	}
  </style>
  <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="styles.css">
</head>
<body onload="update();">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<! SCORE BOARD STUFF !>
<div class="wholegame">
<div class="division1">

<div id="scoreBoard" class="scoreBoard"></div>
</div>

<! GAME STUFF !>
    <div class="division2">
  <h1>Good Ol' Mole Whacking</h1>
  <h1 class="score" id="score"> 0</h1>
  <div class = "start">
  <button onClick="startGame()">Start!</button>
  <button onClick="logOut()">Log Out</button>
  </div>
  <div class="game">
    <div class="hole hole1">
      <div class="mole"></div>
    </div>
    <div class="hole hole2">
      <div class="mole"></div>
    </div>
    <div class="hole hole3">
      <div class="mole"></div>
    </div>
    <div class="hole hole4">
      <div class="mole"></div>
    </div>
    <div class="hole hole5">
      <div class="mole"></div>
    </div>
    <div class="hole hole6">
      <div class="mole"></div>
    </div>
  <div class="hole hole7">
    <div class="mole"></div>
  </div>
  <div class="hole hole8">
    <div class="mole"></div>
  </div>
  <div class="hole hole9">
    <div class="mole"></div>
  </div>


<script src="script.js"></script>

</div>
</div>
</body>
</html>

<?php
} else {
	header("Location: login.php");
}
?>
