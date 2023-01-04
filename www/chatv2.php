<?php
@session_start();

if ($_SESSION["authentication"] == "valid" && isset($_SESSION["currentID"])) {
?>

<!DOCTYPE html>
<html lang="en" style="background-color:DodgerBlue;">

<head>

<style>
.title{
	font-family: "Comic Sans MS", "Comic Sans", cursive;
	font-size: 36px;
}
.messageBox {
	overflow: auto;
	margin:4px, 4px;
    padding:4px;
	height: 60px;
	width: 350px;
	font-family: 'Helvetica', 'Arial', sans-serif;
	color: #444444;
    font-size: 14pt;
    background-color: #FAFAFA;
}
.ui {
	font-family: 'Helvetica', 'Arial', sans-serif;
	color: #444444;
    font-size: 14pt;
    background-color: #FAFAFA;
}
.div {
	overflow: auto;
	font-family: "Comic Sans MS", "Comic Sans", cursive;
	font-size: 20px;
	height: 440px;
	width: 200;
	background-image: url("images/chatBackground.png");
}
</style>

<center><b class="title">Lets Chat 2.0</b></center>

</head>
<body onload="update();">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
var intervalId = window.setInterval(function(){
	var objDiv = document.getElementById("chatLog");
	var a = objDiv.scrollTop;
	var b = objDiv.scrollHeight - objDiv.clientHeight;
	if(a/b < 1) {
		updateNoScroll();
	} else {
		update();
	}
}, 1000);
	function update() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("chatLog").innerHTML = this.responseText;
		scrollToBottom();
		}
		};
		xhttp.open("GET", "chatsv2.php", true);
		xhttp.send();
    }
    function updateNoScroll() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("chatLog").innerHTML = this.responseText;
		}
		};
		xhttp.open("GET", "chatsv2.php", true);
		xhttp.send();
    }
	
	function add() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		update();
		}
		};
		var message = document.getElementById("messageBox").value;
		document.getElementById("messageBox").value="";
		if(message=="")return;
		xhttp.open("GET", "addChatLogv2.php?message="+message, true);
		xhttp.send();	
	}
	function scrollToBottom() {
		var objDiv = document.getElementById("chatLog");
		objDiv.scrollTop = objDiv.scrollHeight;
	}
	function logOut() {
		window.location.replace("http://compsci.asmsa.org/clarkd22/logOut.php");
	}
</script>

<div class="div" id="chatLog">
</div> 
<br>

<textarea rows = "5" cols = "60" name = "message" id="messageBox" class="messageBox"></textarea><br>
<input type="button" onclick="add();" value="Post" id="addButton" class="ui"><br>
<input type="button" onclick="logOut();" value="Log Out" id="logOut" class="ui"><br>
<br>

</html>

<?php
} else {
	header("Location: chatv2Login.php?null");
}
?>
