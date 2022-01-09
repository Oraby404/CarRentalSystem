<!DOCTYPE>
<html>
<head>
	<title>Result</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>    
	<table class="table table-striped">
		<thead>
	<?php
		session_start();
	  	$db = mysqli_connect("localhost", "root", "", "crs");
		if ($db->connect_error) {die("Connection failed: " . $db->connect_error);}
		$email=$_POST["email"];
		
		echo"<tr><th>" . ' User Name ' . "</th><th>" . ' E-mail ' . "</th><th>" . ' Car Model ' . "</th><th>" . 'Plate Number' . "</th><th>" . 'Days / Rent' . "</th><th>" . 'Total Price' . "</th></tr>";	

		echo "</thead>";

		$q="SELECT * FROM reservation as r NATURAL JOIN sys_user as u NATURAL JOIN car as c where u.email='$email'";

		if ($result = mysqli_query($db,$q)) {		
		echo "<tbody>";
		while($row = $result->fetch_assoc()) {

			$price=$row["reservation_period"]*$row["daily_rent"];
			
			echo "<tr><td>" . $row["user_name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["car_model"]. "</td><td>" . $row["car_plate_id"] . "</td> 				<td>". $row["reservation_period"] .'/'. $row["daily_rent"] . "</td><td>". $price . "</td> </tr>";
		}
		echo "</tbody>";
		echo "</table>";
		}
		$db->close();
		?>
	</table>
</body>
</html>