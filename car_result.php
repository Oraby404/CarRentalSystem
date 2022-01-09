<!DOCTYPE>
<html>
<head>
	<title>Result</title>
	    <link rel="stylesheet" type="text/css" href="result.css">
</head>
<body>    
	<table>
		<tr><th>Plate_id</th><th>Car Manufacturer</th><th>Model</th><th>Year</th><th>Status</th><th>Daily Rent</th><th>Distance Covered</th><th>Office</th></tr>
	<?php
		$db = mysqli_connect("localhost", "root", "", "crs");
		// Check connection
		if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
		}
		$result = mysqli_query($db, "SELECT * FROM car");
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["car_plate_id"]. "</td><td>" . $row["car_manufacture"] . "</td><td>". $row["car_model"]. "</td><td>" . $row["car_year"] . "</td><td>" . $row["car_status"] . "</td><td>" . $row["daily_rent"] . "</td><td>" . $row["distance_covered"] . "</td><td>" . $row["office"] . "</td></tr>";
			}
		echo "</table>";
		}	 
		else { echo "0 results"; }
		$db->close();
		?>
	</table>
</body>
</html>