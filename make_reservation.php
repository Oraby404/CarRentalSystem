<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

$car_plate_id = $_POST["car_choice"];
$_SESSION['car_plate_id'] = $car_plate_id;

$reservation_day = $_POST["reservation_day"];
$_SESSION['reservation_day'] = $reservation_day;

$return_day = $_POST["return_day"];
$_SESSION['return_day'] = $return_day;


$period = (strtotime($return_day) - strtotime($reservation_day)) / 86400;

$sql = "SELECT daily_rent FROM car WHERE car_plate_id='$car_plate_id'";

$daily_rent = 0;
if ($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
    if ($row) {
        $daily_rent = $row["daily_rent"];
    }
}

$payment_amount = $period * $daily_rent;

$_SESSION['payment_amount'] = $payment_amount;

$sql = "SELECT max(payment_id) as max_id FROM payment";

$payment_id = 0;
if ($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
    if ($row) {
        $payment_id = $row["max_id"] + 1;
    }
}

$_SESSION['payment_id'] = $payment_id;

$sql = "INSERT INTO payment (payment_id,payment_amount) VALUES ('$payment_id','$payment_amount')";

$conn->query($sql);


$user = $_SESSION['user_id'];
$user_id = $user["user_id"];


$sql = "INSERT INTO reservation (user_id , car_plate_id ,payment_id,reservation_day,return_day,reservation_period) VALUES ('$user_id','$car_plate_id','$payment_id', '$reservation_day','$return_day','$period')";


if ($conn->query($sql) === TRUE) {
    header('location:payment.php');

} else {
    echo "<h1>Reservation Failed!</h1><br>";
    echo '<a href="search.php">Back</a>';
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();