<?php
//<!-- This page helps admin login by taking entries from login page i.e. admin.php and directing to adminpanel.php-->
session_start();

require_once 'login.php';

// create a session for the admin if her credentials exist in our database table "admins"
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['Username'] ) && isset( $_POST['Password'] ) ) {
        // Getting submitted user data from database
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

        // Check connection
        if ($conn->connect_error) {
            $message = "Something went wrong. Please try signing in again!";
            exitSystem($message);
            exit();
        } 

        $username = $_POST['Username'];
        $password = $_POST['Password'];

        $sql = "select count(*) as count from admins where username='$username' and password='$password';";
        $result = $conn->query($sql);
        if ($result) {
            $count = $result->fetch_assoc()["count"];

            // this checks if username and password exists then the admin is valid and redirects to admin panel where they can manage the content of the website
            if ($count>0) {
                $_SESSION['username'] = $username;
                echo "<script type='text/javascript'>window.location.href='adminpanel.php'</script>";
            } else {
                $message = "Either your username, password or both are incorrect. Try again!";
                exitSystem($message);
            }
        } else {
            $message = "Something went wrong. Please try signing up again!";
            exitSystem($message);
        }
        $conn->close();
    }
}


//It takes user back to admin login page i.e. admin.php and displays the relevant message based on the nature of the failure of query
function exitSystem($message) {
    echo '<script type="text/javascript">alert("' . $message . '"); window.location.href = "admin.php";</script>';

}


?>