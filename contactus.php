<?php

$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$dateitem=$_POST['birthdate'];
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
	exit();
}


$contact = "insert into contactus (name,phone,email,birthdate,budget,interests,message) values ('$fullname', '$phone','$email','$dateitem','$Budget','$Interest','$message');";



$result=$conn->query($contact);

if ($result) {
	$message = "Thank you. We have received your info and will contact your shortly";
	exitSystem($message);
} else {
	$message="Something went wrong. Please try again2!";
	exitSystem($message);
}


//It takes user back to contact us page and displays the relevant message based on success of query
function exitSystem($message) {
    echo '<script type="text/javascript">alert("' . $message . '"); window.location.href = "contactus.html";</script>';

}

$conn->close();

?>
