<?php

$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$dateitem=$_POST['birthdate'];
$people=$_POST['quantity'];
$Budget=$_POST['budget'];
$Interest=$_POST['interests'];
$message=$_POST['message'];



require_once 'login.php';

//connect to DBMS, select DB
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error)
{
	$message = "Something went wrong. Please try again!";
	exitSystem($message);
}


$contact = "INSERT INTO contactus (name,phone,email,birthdate,quantity,budget,interests,message) VALUES ('$fullname', '$phone','$email','$dateitem','$people','$Budget','$Interest','$message');";

$result = $conn->query($contact);
$conn->close();

if ($result) {
	$message = "Thank you. We have received your info and will contact your shortly";
	exitSystem($message);
} else {
	$message = "Something went wrong. Please try again!";
	exitSystem($message);
}


function exitSystem($message) {
		echo "<script type='text/javascript'>alert('$message'); 
		window.location.href = 'contactus.html'; </script>";
}

?>
