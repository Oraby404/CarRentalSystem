<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "crs");
    if (!$db) {die("Connection failed: " . mysqli_connect_error());}
	
	$plate_id = $_POST["Plate"];
	$car_manufacture = $_POST["manufacture"];
	$car_model = $_POST["model"];
	$model_year = $_POST["year"];
    $car_status = $_POST["Status"];
    $office = $_POST["off"];

    /*$plate_id='aaaaaaa';
    $car_manufacture = 'aaa';
    $car_model = '2';
    $model_year = '1999';
    $car_status = 'ACTIVE';
    $office = 'USA';*/
        
    $sql = "SELECT * FROM car WHERE car_plate_id='$plate_id' And car_manufacture='$car_manufacture' And car_model='$car_model'  And car_year='$model_year'  And car_status='$car_status'   And office='$office'";
    
    $record = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($record);
if ($row)
{       
        $_SESSION['myValue']= $plate_id;
        header('Location: edit.php');
} 
else
     header('Location: modify.html');        

?>