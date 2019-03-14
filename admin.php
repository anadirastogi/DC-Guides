<?php
//<!-- This is the admin login page -->

session_start();

// if a user is already in session then redirect to admin panel directly 
if ( isset( $_SESSION['username'] ) ) {
	echo '<script type=text/javascript>windows.location.href="adminpanel.php";</script>';
} 
?>
<html>

<head>
	<script type="text/javascript" src="scripts/loginValidations.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>DC Tour Guides</title>
</head>

<body>
	<div>
		<div id="header">	
			<img src="images/Logo.png" width=25% height=100%/> 
			<div id="nav-bar">
				<a href="admin.php" id="selected">Admin</a>
				<a href="index.html">Go Back to Website</a>
			</div>
		</div>
		<div id="body" style="height:54%;" >
			<div style="width: 40%;" align="center">
				<form name="jform" method="post" action="adminlogin.php" onsubmit="return checkLogin()">
					<div class="box" align="center">
						<h1>Existing Admin Login</h1>
						<br/>
						<div class="form-group">
							<input type="username" name="Username" placeholder="username" class="username"/>
						</div>
						<div class="form-group">
							<input type="password" name="Password" placeholder="password" class="username"/>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" name="submit"/>
						</div>

					</div>

				</form>		
			</div>

			<div id="verticalBorder" align="center">

			</div>

			<div style="width: 50%; margin-left: 5%" align="center">
				<form method="post" name="NewForm" action="newuser.php" onsubmit="return checkNewSignUp()">
					<div class="box" align="center">
						<h1>New Admin Sign Up</h1>

						<div class="form-group">
							<input type="username" name="NewUsername" placeholder="New Username" class="username"/>
						</div>
						<span align="left"> Should only be 5 to 15 alphanumeric characters! </span>
						<div class="form-group">
							<input type="password" name="NewPassword" placeholder="New Password" class="username"/>
						</div>
						<span align="left"> Should just be 4 numeric digits</span>
						<div class="form-group">
							<input type="password" name="ConfirmedPassword" placeholder="Confirm New Password" class="username"/>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" name="submit" />
						</div>

					</div>

				</form>		
			</div>

		</div>
		<div id="footer">	
			<br/>
			<div id="footer_social1" style="height: 30%;" align="center">
				<p><i>Find us on:</i></p>
			</div>
			<div id="footer_social2" style="height: 50%;" align="center">
				<a href="https://www.facebook.com/anadi.rastogi47" target="_blank"><img src="images/fb.png" /></a>
				<a href="https://www.instagram.com/anadirastogi" target="_blank"><img src="images/insta.png" /></a>
				<a href="https://www.twitter.com/r_anadi" target="_blank"><img src="images/twitter.png" /></a>
			</div>
		</div>
	</div>

</body>
<footer	style ="margin: 20px 0 0 0;" id="copyright"	align="center">&copy:	2019 DC Guides </footer>
</html>