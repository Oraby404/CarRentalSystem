<?php
    $db = mysqli_connect("localhost", "root", "", "crs");
    if (!$db) {die("Connection failed: " . mysqli_connect_error());}
	
	$plate_id = $_POST["Plate"];
	$car_manufacture = $_POST["manufacture"];
	$car_model = $_POST["model"];
	$model_year = $_POST["year"];
    $car_status = $_POST["Status"];
    $distance_covered = $_POST["distance"];
    $daily_rent = $_POST["rent"];
    $office = $_POST["off"];
        
    $sql = "SELECT * FROM car WHERE car_plate_id='$plate_id'";

    if ($result = $db->query($sql))
    {
        $row = $result->fetch_assoc();
        if ($row) {
             echo "<h1>Plate_Id Already Exists!</h1><br>";
             echo '<a href="addcar.html">Back</a>';

        } else {
            $sql = "INSERT INTO car (car_plate_id , car_manufacture , car_model,car_year,car_status,distance_covered,daily_rent,office) VALUES ('$plate_id','$car_manufacture','$car_model','$model_year','$car_status','$distance_covered','$daily_rent','$office')";
            $db->query($sql);
		    echo "<h1>Car ADDED!</h1><br>";
            echo '<a href="admin_panel.html">Back</a>';        
        }
    } 
else {
    echo "<h1>Failed to addcar!</h1><br>";
    echo "Error: " . $sql . "<br>" . $db->error;
}



$db->close();
?>