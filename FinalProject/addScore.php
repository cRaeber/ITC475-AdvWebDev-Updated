<?php # admin.php

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "finaldb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['Score'])) $Score = $_POST['Score'];

$sql = "INSERT INTO scores (Score)
VALUES('$Score')";

submitData($conn,$sql);

function submitData($conn,$sql){
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo <<<_START
		<html>
			<head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<title>Leep Frog</title>
				<script src="https://unpkg.com/react/umd/react.development.js"></script>
				<script src="https://unpkg.com/react-dom/umd/react-dom.development.js"></script>
				<link href="Default.css" rel="stylesheet" />
			</head>
			<body>
				<div class="wrapper">
	<header>
		<nav>
			<div id="WelcomeBar"></div>
				<ul>
					<li><a href="Home.html">Play</a></li>
					<li><a href="Rules.html">Rules</a></li>
					<li><a href="HighScore.php">High Scores</a></li>
				</ul>
		</nav>
	</header>
	<article>
		<h1>Score recorded<h1>
	</article>
					<main>
	_START;
?>
