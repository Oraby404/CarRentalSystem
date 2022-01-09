<!DOCTYPE html>
<html>
<head>
    <title>redirect</title>
    <link rel="stylesheet" type="text/css" href="redirect.css">
</head>
<body>
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
     
    $sql = "SELECT * FROM car WHERE car_plate_id='$plate_id' And car_manufacture='$car_manufacture' And car_model='$car_model'  And car_year='$model_year'  And car_status='$car_status'   And office='$office'";
    
    $record = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($record);
if ($row)
{       
        $_SESSION['myValue']= $plate_id;
        header('Location: edit.html');
} 
else
{
     echo "<h1>Data Not Valid !</h1><br>";
     echo "<h2>Back In Two Seconds!</h2><br>";
     header( "refresh:2;url=modify.html" ); 
}

?>
</body>
</html>