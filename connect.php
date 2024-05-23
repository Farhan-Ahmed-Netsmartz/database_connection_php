<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	echo "$firstName"
	// Database credentials
	$host = 'phpconn-server.mysql.database.azure.com';
	$username = 'sqygkkdded';
	$password = 'farhan@1234';
	$database = 'phpconn-database';
	$port = 3306;
	
	// Establish a connection
	$conn = new mysqli($host, $username, $password, $database, $port, MYSQLI_CLIENT_SSL);


	// Database connection
	//$conn = new mysqli('phpconn-server.mysql.database.azure.com','sqygkkdded','farhan@1234','deploytest-1-database', MYSQLI_CLIENT_SSL);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
