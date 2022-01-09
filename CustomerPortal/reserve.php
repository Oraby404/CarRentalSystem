<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reserve a car</title>
    <link rel="stylesheet" type="text/css" href="reserve.css">
    <script type='text/javascript'>
        function validateReserveForm() {
            let date1 = document.forms["car_reservation"]["reservation_day"].value;
            let date2 = document.forms["car_reservation"]["return_day"].value;
            let reservation_day = new Date(date1);
            let return_day = new Date(date2);

            let today = new Date();

            if ((reservation_day.getTime() - today.getTime()) < 0) {
                alert("Reservation Day Can't be in the PAST!");
                return false;
            }

            if ((return_day.getTime() - reservation_day.getTime()) <= 0) {
                alert("Return Day must be after Reservation Day!");
                return false;
            }
            return true;
        }
    </script>

</head>

<body>

<h2>Reservation Page</h2>

<div>
    <form name="car_reservation" action="make_reservation.php" onsubmit="return validateReserveForm();" method="post">

        <label for="car_choice">Available Cars</label>
        <select id="car_choice" name="car_choice" required>
            <option value="">Select a Car to rent</option>
            <?php

            $db = mysqli_connect("localhost", "root", "", "crs");
            if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $car_manufacturer = $_POST["car_manufacturer"];
            $year = (int)$_POST["year"];
            $distance = (int)$_POST["distance"];
            $rent = (float)$_POST["rent"];
            $office = $_POST["office"];

            $records = mysqli_query($db, "SELECT * FROM car WHERE car_manufacture = '$car_manufacturer' and distance_covered <= '$distance' and car_year >= '$year' and daily_rent <= '$rent' and office = '$office' and car_status = 'ACTIVE'");

            if (mysqli_num_rows($records) == 0) {
                session_start();
                $_SESSION['search'] = 0;
                header('location:search.php');

            } else {
                while ($rs = mysqli_fetch_array($records)) {
                    echo "<option value='" . $rs['car_plate_id'] . "'>" . $rs['car_manufacture'] . ' ' . $rs['car_model'] . ' ' . $rs['car_year'] . "  Distance Covered : " . $rs['distance_covered'] . "KM   Daily rent : " . (int)$rs['daily_rent'] . "</option>";
                }
            }


            mysqli_close($db);
            ?>
        </select>

        <br><br>

        <label for="reservation_day">Reservation Day</label>
        <input type="date" id="reservation_day" name="reservation_day" required>
        <br><br>

        <label for="return_day">Return Day</label>
        <input type="date" id="return_day" name="return_day" required>

        <br><br>

        <button type="submit">Reserve</button>
        <br><br>

        <br><br>

    </form>

</div>
</body>
</html>