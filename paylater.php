<!DOCTYPE html>
<html lang="en">
<head>
    <title>Summary</title>
    <link rel="stylesheet" type="text/css" href="reserve.css">
    <script src="reserve.js"></script>
</head>

<body>

<h2>Reservation Receipt</h2>

<div>

    <form name="finish" method="post" action="login.html">
        <br><br>

        <label>Reservation Status : UnPaid</label>
        <br><br>

        <?php
        $db = mysqli_connect("localhost", "root", "", "crs");
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        session_start();
        $payment_amount = $_SESSION['payment_amount'];
        echo "<label>" . 'Amount to be paid : ' . $payment_amount . "</label><br> <br>";
        $user = $_SESSION['user_id'];
        $user_name = $user["user_name"];
        echo "<label>" . 'Customer Name : ' . $user_name . "</label><br><br>";

        $car_plate_id = $_SESSION['car_plate_id'];
        echo "<label>" . 'Car Plate ID : ' . $car_plate_id . "</label><br><br>";

        $reservation_day = $_SESSION['reservation_day'];
        echo "<label>" . 'Reservation Day : ' . $reservation_day . "</label><br><br>";
        $return_day = $_SESSION['return_day'];
        echo "<label>" . 'Return Day : ' . $return_day . "</label><br><br>";


        $records = mysqli_query($db, "SELECT * FROM car WHERE car_plate_id ='$car_plate_id'");

        $rs = mysqli_fetch_array($records);
        echo "<label>" . "Car Model :" . $rs['car_manufacture'] . ' ' . $rs['car_model'] . ' ' . $rs['car_year'] . "</label><br><br>";


        mysqli_close($db);

        ?>

        <button type="submit" id="signout" name="signout">Sign Out</button>
        <br><br>

        <br><br>

    </form>


</div>
</body>
</html>
