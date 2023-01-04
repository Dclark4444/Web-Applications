<!DOCTYPE html>
<html lang="en" style="background-color:DodgerBlue;">

<head>

<style>
.title{
	font-family: "Comic Sans MS", "Comic Sans", cursive;
	font-size: 36px;
}
.ui {
	font-family: 'Helvetica', 'Arial', sans-serif;
	color: #444444;
    font-size: 14pt;
    background-color: #FAFAFA;
}
</style>

<?php
$uri = $_SERVER['REQUEST_URI'];
$url_components = parse_url($uri);
parse_str($url_components['query'], $params);

if (isset($params['error'])) {
	echo '<p class="ui">An error has occured. The login you entered has either an incorrect username, password, or simply doesn\'t exist.</p><br>';
}
?>


<center><b class="title">Please Log In or Sign Up to Chat!</b></center></head><br>

<body>
	
<script>

function signIn() {
	var user = document.getElementById("user").value;
	var pass = document.getElementById("pass").value;
	
	window.location = ("http://compsci.asmsa.org/clarkd22/validate.php?user=" + user + "&pass=" + pass);
}

function signUp() {
	window.location = ("http://compsci.asmsa.org/clarkd22/newUser.php?null");
}

function maybeAdd(e) {
	if (e.code === "Enter") signIn();
}
</script>

<input type="text" name="user" id="user" class="ui"><br>
<input type="password" name="pass" id="pass" class="ui" onkeydown="maybeAdd(event);"><br>
<input type="button" onclick="signIn();" value="Sign In" id="signIn" class="ui"><br><br>
<input type="button" onclick="signUp();" value="New here? Sign Up!" id="signUp" class="ui"><br>

</body>
</html>
