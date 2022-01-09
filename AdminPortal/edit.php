<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "crs");
    if (!$db) {die("Connection failed: " . mysqli_connect_error());}

    $car_manufacture = $_POST["manufacture"];
	$car_model = $_POST["model"];
	$model_year = $_POST["year"];
    $car_status = $_POST["Status"];
    $distance_covered = $_POST["distance"];
    $daily_rent = $_POST["rent"];
    $office = $_POST["off"];
    $var_value =  $_SESSION['myValue'];
    
    $sql="UPDATE `car` SET `car_manufacture` = '$car_manufacture', `car_model` = '$car_model', `car_status` = '$car_status', `office` = '$office' WHERE `car`.`car_plate_id` = '$var_value'";

    if($db->query($sql))
            header('Location: admin_portal.html');
    else
        echo "ERROR";
?>