<?php
session_start();

// check if session still exists, if not redirect to amdin login page i.e. admin.php
if (!isset( $_SESSION['username'] ) ) {
	echo "<script type='text/javascript'>alert('login to proceed'); 
	window.location.href = 'admin.php'; </script>";
	exit();
}

require_once 'login.php';

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($conn->connect_error)
{
	echo "Failed to connect to MySQL: " . $conn->connect_error;
	exit();
}

?>


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
				<a href="" id="selected">Hi, <?php echo $_SESSION['username']?></a>
				<a href="index.html">Go Back to Website</a>
			</div>

			<div align="right"; style="margin-top:3%;">
				<a href="logout.php">logout</a>
			</div>
		</div>
		<div id="body" style="display: block;" >
			<h2 align="center"> Welcome to Content Management System of DC Guides!</h2>

			<div>
				<p style="color: bisque;"><i><b> People who have contacted us so far via <a href="contactus.html">CONTACT US</a> page!</b></i></p>
				<?php
				$result = mysqli_query($conn,"SELECT * FROM contactus");

				echo "<table border='1'>
				<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Birthdate</th>
				<th>Budget</th>
				<th>Interests</th>
				<th>Message</th>
				</tr>";

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['phone'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['birthdate'] . "</td>";
					echo "<td>" . $row['budget'] . "</td>";
					echo "<td>" . $row['interests'] . "</td>";
					echo "<td>" . $row['message'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
				?>
			</div>
			
			<div> 
				<br/>
				<br/>
			</div>

			<div>
				<p style="color: bisque;"><i><b> Entries in the <a href="attractions.php">DC ATTRACTIONS</a> page for the image slider!</b></i></p>
				<?php
				$result = mysqli_query($conn,"SELECT * FROM attractions");

				echo "<table border='1'>
				<tr>
				<th>ID</th>
				<th>Image Link</th>
				<th>Name</th>
				<th>Address</th>
				<th>Description</th>
				<th>External Link</th>
				</tr>";

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['imgLink'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['address'] . "</td>";
					echo "<td>" . $row['description'] . "</td>";
					echo "<td>" . $row['externalLink'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";

				mysqli_close($conn);
				?>
			</div>


			<div> 
				<br/>
				<br/>
			</div>

			<div>
				<p style="color: bisque;"><i><b> Make an entry for a new DC city attraction and <br/> see the changes reflected in <a href="attractions.php">DC ATTRACTIONS </a> page's image slider!</b></i></p>

				<form method="post" name='attform' action="attractionentry.php">
					<div class="box">

						<span align="left"> None of the fields can be empty! </span>
						<div class="form-group">
							<input type="text" name="imgLink" placeholder="Image Link" class="username"/>
						</div>
						<div class="form-group">
							<input type="text" name="name" placeholder="Name of Attraction" class="username"/>
						</div>
						<div class="form-group">
							<input type="text" name="address" placeholder="Address" class="username"/>
						</div>
						<div class="form-group">
							<input type="text" name="description" placeholder="Description" class="username"/>
						</div>
						<div class="form-group">
							<input type="text" name="externalLink" placeholder="External Reference Link" class="username"/>
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