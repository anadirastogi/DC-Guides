<?php
session_start();

// this destroys any existing session and redirect's back to admin login page 
session_destroy();
header("Location: admin.php")
?>