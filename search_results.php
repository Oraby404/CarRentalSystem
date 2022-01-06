<?php

$db = mysqli_connect("localhost", "root", "", "crs");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$car_manufacturer = $_POST["car_manufacturer"];
$year = $_POST["year"];
$distance = (int)$_POST["distance"];
$rent = (float)$_POST["rent"];
$office = $_POST["office"];

$records = mysqli_query($db, "SELECT * FROM car WHERE car_manufacture = '$car_manufacturer' and distance_covered <= '$distance' and car_year >= '$year' and daily_rent <= '$rent' and office = '$office'");

while ($row = mysqli_fetch_array($records)) {
    $q1 = $row['car_plate_id'];
    echo "<h1> $q1 </h1><br>";
}

mysqli_close($db);