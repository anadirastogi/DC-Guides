<?php

require_once 'login.php';

//1&2.connect to DBMS, select DB
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error)
{
  echo "Failed to connect to MySQL: " . $conn->connect_error;
}

//3&4.build query, execute query
$result = $conn->query("SELECT * FROM attractions");	

$array1 = Array();
$array2 = Array();
$array3 = Array();
$array4 = Array();
$array5 = Array();

//5.use results
while($row = $result->fetch_assoc()){
	$array1[]=$row['imgLink'];
	$array2[]=$row['name'];
	$array3[]=$row['address'];
	$array4[]=$row['description'];
	$array5[]=$row['externalLink'];

}

//disconnect DBMS
$conn->close();

//convert the PHP array into JSON format, so it works with javascript
$json_array1 = json_encode($array1);
$json_array2 = json_encode($array2);
$json_array3 = json_encode($array3);
$json_array4 = json_encode($array4);
$json_array5 = json_encode($array5);

?>

<script>
	//now put it into the javascript
	var picArray=<?php echo $json_array1; ?>;
	var picDetails=<?php echo $json_array2; ?>;
	var inHTML=<?php echo $json_array2; ?>;
	var attractionLink=<?php echo $json_array5; ?>;
	var attractionDetails=<?php echo $json_array4; ?>;
	var attractionAddress=<?php echo $json_array3; ?>;

</script>


<html>
	<head>
		<title>DC Guides - Attractions</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="scripts/imgSlider.js"></script>
	</head>

<body onload="firstElementOfSlider()">
	<div>
		<div id="header">	
			<img src="images/Logo.png" width=25% height=100%/> 
			<div style="position: fixed; left:78%;">
			<input class="styled" type="button" onclick="window.location.href='admin.html'" value="Admin login">
			</div>
			<div id="nav-bar">
				<a href="index.html">Home</a>
				<a href="aboutus.html">About us</a>
				<a href="attractions.php" id="selected">DC Attractions</a>
				<a href="guides.html">Our Guides</a>
				<a href="contactus.html">Contact Us</a>
			</div>
		</div>

		<div id ="hiddenAttractions" style="height:50%"> 
			<p style="margin-top: 5%;" align="center">Please add some content under "Attractions" by logging in as admin!</p>
		</div>


		<div id="bodyAttractions" style="display: none;">
			<div align="center">
				<img src="" alt="" title="" name="dcImg" id="img_att" height="60%" width="40%"/>
			</div>


			<div align="center" style="margin: 2% 0 0 0;">
				<input type="submit" onclick="prevpic()" value="prev"/>
				<input type="submit" onclick="nextpic()" value="next"/>
			</div>

			<div style="margin: 0 20% 0 20%" align="center">
				<p id="attractionName"><b></b></p>
				<p id="attractionAddress"></p>
				<p id="attractionDetails"></p>
				<p id="hrefSlider"><a href="" id="attractionLink" target="_blank">Click for more info</a></p> 
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