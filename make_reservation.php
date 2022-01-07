<?php

$db = mysqli_connect("localhost", "root", "", "crs");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$car_plate_id = $_POST["car_choice"];
$reservation_day = $_POST["reservation_day"];
$return_day = $_POST["return_day"];
$Payment = $_POST["Payment"];

session_start();
$user_id = $_SESSION['user_id'];
session_destroy();
echo "user : $user_id    car :$car_plate_id";

$sql = "INSERT INTO reservation (user_id , car_plate_id ,reservation_day,return_day) VALUES ('$user_id','$car_plate_id', '$reservation_day','$return_day')";

$records = mysqli_query($db, $sql);

echo "<h1> reservation successful</h1><br>";
echo '<a href="login.html">Signout</a>';

mysqli_close($db);
