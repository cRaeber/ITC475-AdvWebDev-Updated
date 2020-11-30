
        <?php

		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "testdb";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        #First Name
        if (isset($_POST['firstName'])) $firstName = $_POST['firstName'];
        else $firstName = "(Not entered)";

        #Last Name
        if (isset($_POST['lastName'])) $lastName = $_POST['lastName'];
        else $lastName = "(Not entered)";

        #Email Address
        if (isset($_POST['emailAddress'])) $emailAddress = $_POST['emailAddress'];
        else $emailAddress = "(Not entered)";

        #Phone Number
        if (isset($_POST['phoneNumber'])) $phoneNumber = $_POST['phoneNumber'];
        else $phoneNumber = "(Not entered)";

        #Number of Adults
        if (isset($_POST['numberOfAdults'])) $numberOfAdults = $_POST['numberOfAdults'];
        else $numberOfAdults = "(Not entered)";

        #Number of Children
        if (isset($_POST['numberOfChildren'])) $numberOfChildren = $_POST['numberOfChildren'];
        else $numberOfChildren = "(Not entered)";

        #Trip Date
        if (isset($_POST['tripDate'])) $tripDate = $_POST['tripDate'];
        else $tripDate = "(Not entered)";

        #Destination
        if (isset($_POST['destination'])) $destination = $_POST['destination'];
        else $destination = "(Not entered)";

        $activities = array();
        if (isset($_POST['cityTours']) and $_POST['cityTours'] == 'on') array_push($activities, "City Tours");
        if (isset($_POST['sports']) and $_POST['sports'] == 'on') array_push($activities, "Sports");
        if (isset($_POST['cycling']) and $_POST['cycling'] == 'on') array_push($activities, "Cycling");
        if (isset($_POST['museums']) and $_POST['museums'] == 'on') array_push($activities, "Museums");
        if (isset($_POST['boating']) and $_POST['boating'] == 'on') array_push($activities, "Boating");
        if (isset($_POST['sailing']) and $_POST['sailing'] == 'on') array_push($activities, "Sailing");
        if (isset($_POST['beach']) and $_POST['beach'] == 'on') array_push($activities, "Beach");
        if (isset($_POST['hiking']) and $_POST['hiking'] == 'on') array_push($activities, "Hiking");
        if (isset($_POST['theatre']) and $_POST['theatre'] == 'on') array_push($activities, "Theatre");
        if (isset($_POST['parksRec']) and $_POST['parksRec'] == 'on') array_push($activities, "Parks and Recreation");
        if (isset($_POST['snorkeling']) and $_POST['snorkeling'] == 'on') array_push($activities, "Snorkeling");

        $activity1 = array_pop($activities);
        $activity2 = array_pop($activities);
        $activity3 = array_pop($activities);
        $activity4 = array_pop($activities);
        $activity5 = array_pop($activities);

		$sql = "INSERT INTO clients (FirstName, LastName, Phone, Email, Adults, Children, Destination, Date, Activity1, Activity2, Activity3, Activity4, Activity5)
	VALUES ('$firstName', '$lastName', '$phoneNumber', '$emailAddress', '$numberOfAdults', '$numberOfChildren', '$destination', '$tripDate', '$activity1', '$activity2', '$activity3', '$activity4', '$activity5')";

        function submitData($conn,$sql){
            if ($conn->query($sql) === TRUE) {
                echo "<p>An agent will be in touch with you soon!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

		submitData($conn, $sql);

        echo <<<_START
		<html>
			<head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<link href="default.css" rel="stylesheet"/>
				<link href="fw_Styles.css" rel="stylesheet" />
				<script src="https://unpkg.com/react/umd/react.development.js"></script>
				<script src="https://unpkg.com/react-dom/umd/react-dom.development.js"></script>
				<script src="Greeting.js"></script>
				<script src="SunMoonDisplay.js"></script>
				<title>Mega Travel Site</title>
			</head>
			<body>
				<header>
					<img id="logo" src="megatravellogo.png" alt="Logo" />
				</header>
				<div id="WelcomeBar"></div>
				<nav>
					<div id="SunMoonDisplay"></div>
					<ul class="nav">
						<li><a href="mt_homepage.html">Home</a></li>
						<li><a href="mt_aboutpage.html">About Us</a></li>
						<li><a href="mt_contactclient.html">Contact An Agent</a></li>
						<li><a href="mt_admin.html"> Admin Ports</a></li>
					</ul>
				 </nav>
				<article>
					<div>
						<h2>Form Submitted</h2>
						<p>Thank you for submitting your travel agent contact request! Here is the information you submitted:</p>
						<br/>
					</div>
				</article>
				<main>
					<h2>First Name</h2>
					<p>$firstName</p>
					<br/>
					<h2>Last Name</h2>
					<p>$lastName</p>
					<br/>
					<h2>Email Address</h2>
					<p>$emailAddress</p>
					<br/>
					<h2>Phone Number</h2>
					<p>$phoneNumber</p>
					<br/>
					<h2>Number of Adults</h2>
					<p>$numberOfAdults</p>
					<br/>
					<h2>Number of Children</h2>
					<p>$numberOfChildren</p>
					<br/>
					<h2>Trip Date</h2>
					<p>$tripDate</p>
					<br/>
					<h2>Destination</h2>
					<p>$destination</p>
					<br/>
					<h2>Actitivies Chosen</h2>
					<p>$activity1</p>
					<p>$activity2</p>
					<p>$activity3</p>
					<p>$activity4</p>
					<p>$activity5	</p>
					<br>
	_START;
        echo <<<_END
				</main>
				<footer>Copyright Protected. All rights reserved. <br /> <br /> MEGA TRAVELS <br /> mega@travels.com</footer>
			</body>
		</html>
	_END;
?>
