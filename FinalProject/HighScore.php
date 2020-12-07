<?php # admin.php

$servername = "localhost";
$username = "root"; #Not recommmended in production, just used for testing!!
$password = "";
$dbname = "finaldb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); #Kill the app if the connection fails.
}

$sql = "SELECT * FROM scores order by Score desc limit 10 ";
$result = $conn->query($sql);

#Building the page.
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
					<main>
	_START;

$i = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$i++;
        echo
        "<div class='card'>
								<h2> {$i} : {$row['Score']} </h2>
			        		</div>";
    }
} else {
    echo "0 results";
}

$conn->close();
echo <<<_END
						</div>
					</main>
				</div>
			</body>
		</html>
	_END;
?>
