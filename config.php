<?php
session_start();

	$servername = "";
	$username = "";
	$password = "";
	$dbname = "";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	echo '
		<div style="position: fixed;bottom: 11px;right: 10px;">
		<a href="https://quizspot.shop/about/" class="btn "> About QuizSpot </a>
		</div>
	';

	echo '
		<div style="position: fixed;bottom: 11px;left: 10px;">
		<a href="https://github.com/programmerrush/QuizSpot" class="btn "> OpenSource </a>
		</div>
	';
