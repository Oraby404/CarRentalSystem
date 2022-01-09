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
		$car=$_POST["Car"];
		$start=$_POST["start"];
		$last=$_POST["last"];
		//car info
		if ($car!="") {

		echo"<tr><th>" . ' Reservation_day ' . "</th><th>" . ' Return_day ' . "</th><th>" . ' Plate_id ' . "</th><th>" . ' Manufacturer ' . "</th><th>" . ' Model ' . "</th><th>" . 'Year' . "</th><th>" . 'Status' . "</th><th>" . 'Rent' . "</th><th>" . 'Distance' . "</th><th>" . 'Office' . "</th></tr>";	

		echo "</thead>";

		$q="SELECT r.reservation_day,r.return_day,c.car_plate_id,c.car_manufacture,c.car_model,c.car_year,c.car_status,c.daily_rent,c.distance_covered,c.office FROM reservation as r NATURAL JOIN  car as c where r.reservation_day>='$start' AND r.return_day<='$last' AND c.car_model LIKE '$car'";
		if ($result = mysqli_query($db,$q)) {		
		echo "<tbody>";
		while($row = $result->fetch_assoc()) {

			echo "<tr><td>" . $row["reservation_day"]. "</td><td>" . $row["return_day"]. "</td><td>" . $row["car_plate_id"]. "</td><td>" . $row["car_manufacture"] . "</td><td>". $row["car_model"]. "</td><td>" . $row["car_year"] . "</td><td>" . $row["car_status"] . "</td><td>" . $row["daily_rent"] . "</td><td>" . $row["distance_covered"] . "</td><td>" . $row["office"] . "</td></tr>";
		}
		echo "</tbody>";
		echo "</table>";
		}}
		elseif ($car==""){
				echo"<tr><th>" . 'Reservation_day' . "</th><th>" . 'Return_day' . "</th><th>" . 'Plate_id' . "</th><th>" . 'Manufacturer' . "</th><th>" . 'Model' . "</th><th>" . 'Year' . "</th><th>" . 'Status' . "</th><th>" . 'Rent' . "</th><th>" . 'Distance' . "</th><th>" . 'Office' . "</th><th>" . 'user_name' . "</th><th>" . 'registeration_date' . "</th><th>" . 'email' . "</th></tr>";		
		$q="SELECT r.reservation_day,r.return_day,c.car_plate_id,c.car_manufacture,c.car_model,c.car_year,c.car_status,c.daily_rent,c.distance_covered,c.office,u.user_name,u.registeration_date,u.email FROM reservation as r NATURAL JOIN sys_user as u NATURAL JOIN car as c where r.reservation_day>='$start' AND r.return_day<='$last'";

		if ($result = mysqli_query($db,$q)) {		
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["reservation_day"]. "</td><td>" . $row["return_day"]. "</td><td>" . $row["car_plate_id"]. "</td><td>" . $row["car_manufacture"] . "</td><td>". $row["car_model"]. "</td><td>" . $row["car_year"] . "</td><td>" . $row["car_status"] . "</td><td>" . $row["daily_rent"] . "</td><td>" . $row["distance_covered"] . "</td><td>" . $row["office"] . "</td><td>" . $row["user_name"]. "</td><td>" . $row["registeration_date"]. "</td><td>" . $row["email"]. "</td></tr>";
			}
		}}
		$db->close();
		?>
	</table>
</body>
</html>