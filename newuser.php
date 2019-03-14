<?php

$username=$_POST['NewUsername'];
$password=$_POST['NewPassword'];
$cPassword=$_POST['ConfirmedPassword'];

require_once 'login.php';

//connect to DBMS, select DB
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

// Check connection
if ($conn->connect_error) {
	$message = "Something went wrong. Please try signing up again!";
	exitSystem($message);
	exit();
} 


//check if username already exists in the table
$sql = "select count(*) as count from admins where username='$username';";
$result = $conn->query($sql);
if ($result) {
	$count = $result->fetch_assoc()["count"];
	if ($count>0) {
		$message = "This username is not available. Choose a different one";
		exitSystem($message);
		$conn->close();
		exit();
	} 
} else {
	$message = "Something went wrong. Please try signing up again!";
	exitSystem($message);
	$conn->close();
	exit();
}


//insert username & password in the table to create a new account
$sql = "insert into admins (username,password) values ('$username','$password')";
$result = $conn->query($sql); 
if ($result) {
	$message = "Your request to be an admin has been approved. You can now log in";
	exitSystem($message);
} else {
	$message = "Something went wrong. Please try signing up again!";
	exitSystem($message);
}


//It takes user back to admin login page and displays the relevant message based on success of query
function exitSystem($message) {
		echo "<script type='text/javascript'>alert('$message'); 
		window.location.href = 'admin.php'; </script>";
}

$conn->close();

?>
