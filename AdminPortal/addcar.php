<!DOCTYPE html>
<html>
<head>
    <title>redirect</title>
    <link rel="stylesheet" type="text/css" href="reserve.css">

</head>
<body>
<?php
$db = mysqli_connect("localhost", "root", "", "crs");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$plate_id = $_POST["plate_id"];
$car_manufacture = $_POST["car_manufacture"];
$car_model = $_POST["car_model"];
$model_year = $_POST["model_year"];
$car_status = $_POST["car_status"];
$distance_covered = $_POST["distance_covered"];
$daily_rent = $_POST["daily_rent"];
$office = $_POST["office"];

$sql = "SELECT * FROM car WHERE car_plate_id='$plate_id'";

if ($result = $db->query($sql)) {
    $row = $result->fetch_assoc();
    if ($row) {
        echo "<h1>Plate ID Already Exists!</h1><br>";
        echo '<a href="addcar.html">Back</a>';

    } else {
        $sql = "INSERT INTO car (car_plate_id , car_manufacture , car_model,car_year,car_status,distance_covered,daily_rent,office) VALUES ('$plate_id','$car_manufacture','$car_model','$model_year','$car_status','$distance_covered','$daily_rent','$office')";
        $db->query($sql);
        echo "<h1>Car ADDED!</h1><br>";
        echo '<a href="admin_portal.html">Back</a>';
    }
} else {
    echo "<h1>Failed to addcar!</h1><br>";
}


$db->close();
?>
</body>
</html>