<?php

session_start();

// is user logged out before the entry is submitted then this code helps in preventing wrong entries in database
if (!isset($_SESSION['username'] ) ) {
	echo "<script type='text/javascript'>alert('login to proceed'); 
	window.location.href = 'admin.php'; </script>";
	exit();
}

if (empty($_POST['imgLink']) OR empty($_POST['name']) OR 
	empty($_POST['address']) or empty($_POST['description']) or 
	empty($_POST['externalLink']))
{
	exitSystem("None of the fields can be empty!");
	exit();
}

$imgLink=$_POST['imgLink'];
$name=$_POST['name'];
$address=$_POST['address'];
$description=$_POST['description'];
$externalLink=$_POST['externalLink'];

require_once 'login.php';

//connect to DBMS, select DB
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

// Check connection
if ($conn->connect_error) {
	$message = "Something went wrong. Please try again!";
	exitSystem($message);
	exit();
} 


// insert into attractions table in database
$sql = "insert into attractions (imgLink,name,address,description,externalLink) values ('$imgLink','$name','$address','$description','$externalLink')";
$result = $conn->query($sql);
if ($result) {
	$message = "Entry Succesful. Goto DC Attractions page to see changes!";
	exitSystem($message);
} else {
	$message = "Something went wrong. Please try it again!";
	exitSystem($message);
}


//It takes user back to admin panel or content management system page and displays the relevant message based on success of query
function exitSystem($message) {
	echo '<script type="text/javascript">alert("' . $message . '"); window.location.href = "adminpanel.php";</script>';
}

$conn->close();

?>
