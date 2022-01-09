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
		$data=$_POST["date"];

		echo"<tr><th>" . 'Plate Number' . "</th><th>" . 'Car Model' . "</th><th>" . 'Status' . "</th></tr>";

		$q="SELECT c.car_plate_id,c.car_model,c.car_status FROM  car as c , reservation as r  where r.car_plate_id=c.car_plate_id AND '$data' >= r.reservation_day AND '$data'<=r.return_day ";
		
		if ($result = mysqli_query($db,$q)) {		
		while($row = $result->fetch_assoc()) 
			echo "<tr><td>" . $row["car_plate_id"]. "</td><td>". $row["car_model"]. "</td><td>" . 'Reserved' . "</td></tr>";
		}

		$q="SELECT c.car_plate_id,c.car_model,c.car_status FROM  car as c  EXCEPT (SELECT c.car_plate_id,c.car_model,c.car_status FROM  car as c , reservation as r  where r.car_plate_id=c.car_plate_id AND '$data' >= r.reservation_day AND '$data'<=r.return_day)";

		if ($result = mysqli_query($db,$q)) {		
		while($row = $result->fetch_assoc()) 
			echo "<tr><td>" . $row["car_plate_id"]. "</td><td>". $row["car_model"]. "</td><td>". $row["car_status"]. "</td></tr>";
		}
		$db->close();
		?>
	</table>
</body>
</html>