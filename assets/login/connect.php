<?php
    $firstName = $_POST['firstName'];
	$emailId = $_POST['emailId'];
	$password = $_POST['password'];
	

    //database connection
   // Database connection
	$conn = new mysqli('localhost','root','','signup_form');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, emailId, password) values(?, ?, ?,)");
		$stmt->bind_param("sss", $firstName, $emailId, $password,);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>