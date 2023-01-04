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
	display: none;
}
.uiHidden {
	font-family: 'Helvetica', 'Arial', sans-serif;
	color: #444444;
    font-size: 14pt;
    background-color: #FAFAFA;
	display: none;
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
	display: none;
}
</style>

<center><b class="title">Lets Chat</b></center>

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
var user = "Anon";

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


	function signIn() {
		user = document.getElementById("user").value;
		document.getElementById("user").style.display = "none";
		document.getElementById("signIn").style.display = "none";
		document.getElementById("logOut").style.display = "block";
		document.getElementById("chatLog").style.display = "block";
		document.getElementById("addButton").style.display = "block";
		document.getElementById("messageBox").style.display = "block";
		update();
	}
	
	function update() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("chatLog").innerHTML = this.responseText;
		scrollToBottom();
		}
		};
		xhttp.open("GET", "chats.php", true);
		xhttp.send();
    }
    function updateNoScroll() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("chatLog").innerHTML = this.responseText;
		}
		};
		xhttp.open("GET", "chats.php", true);
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
		xhttp.open("GET", "addChatLog.php?userName="+user+"&message="+message, true);
		xhttp.send();	
	}
	/*function remove() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		updateList();
		}
		};
		xhttp.open("GET", "deleteChatLog.php?id="+id, true);
		xhttp.send();
	}*/
	function scrollToBottom() {
		var objDiv = document.getElementById("chatLog");
		objDiv.scrollTop = objDiv.scrollHeight;
	}
	function logOut() {
		document.location.reload()
	}
</script>

<input type="text" name="user" id="user" class="ui">
<input type="button" onclick="signIn();" value="Sign In/Up" id="signIn" class="ui">

<div class="div" id="chatLog">
</div>
<br>

<textarea rows = "5" cols = "60" name = "message" id="messageBox" class="messageBox"></textarea><br>
<input type="button" onclick="add();" value="Post" id="addButton" class="uiHidden"><br>
<input type="button" onclick="logOut();" value="Log Out" id="logOut" class="uiHidden">
