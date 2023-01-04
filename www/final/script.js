const holes = document.querySelectorAll('.hole');
const scoreBoard = document.querySelector('.score');
const moles = document.querySelectorAll('.mole');
let lastHole;
let timeUp = false;
let score = 0;

function logOut() {
	window.location.replace("http://compsci.asmsa.org/clarkd22/final/logOut.php");
}

function update() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	document.getElementById("scoreBoard").innerHTML = this.responseText;
	scrollToBottom();
	}
	};
	xhttp.open("GET", "scores.php", true);
	xhttp.send();
}
function add(temp) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	update();
	}
	};
	var message = temp;
	if(message=="")return;
	xhttp.open("GET", "addScore.php?score="+message, true);
	xhttp.send();	
}
function scrollToBottom() {
	var objDiv = document.getElementById("scoreBoard");
	objDiv.scrollTop = objDiv.scrollHeight;
}

function randomTime(min, max) { 
	return Math.round(Math.random() * (max - min) + min);
}

function randomHole(holes) {
	const idx = Math.floor(Math.random() * holes.length);
	const hole = holes[idx];
	if (hole === lastHole) {
		return randomHole(holes);
	}
	lastHole = hole;
	return hole;
}

function popUp() {
	const time = randomTime(300, 1000);
	const hole = randomHole(holes);
	hole.classList.add('up');
	setTimeout(() => {
	  hole.classList.remove('up');
	  if (!timeUp) popUp();
	}, time);
}

function startGame() {
	scoreBoard.textContent = 0;
	timeUp = false;
	score = 0;
	popUp();
	setTimeout(() => {getScore();}, 10000)
}

function getScore() {
	timeUp = true
	add(score);
}

function whack(e) {
	if(!e.isTrusted) return; 
	score++;
	this.parentNode.classList.remove('up');
	scoreBoard.textContent = score;
}

moles.forEach(mole => mole.addEventListener('click', whack));
