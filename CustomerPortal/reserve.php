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
            $year = $_POST["year"];
            $distance = $_POST["distance"];
            $rent = $_POST["rent"];
            $office = $_POST["office"];

            $sql = "SELECT * FROM car WHERE ";

            $and_index = 0;

            if ($car_manufacturer !== "") {
                $and_index = 1;
                $sql = $sql . 'car_manufacture = ' . '\'' . $car_manufacturer . '\'';
            }
            if ($year !== "") {
                if ($and_index++ > 0)
                    $sql = $sql . ' and ';
                $sql = $sql . 'car_year >= ' . '\'' . (int)$year . '\'';
            }

            if ($distance !== "") {
                if ($and_index++ > 0)
                    $sql = $sql . ' and ';
                $sql = $sql . 'distance_covered <= ' . '\'' . (int)$distance . '\'';
            }

            if ($rent !== "") {
                if ($and_index++ > 0)
                    $sql = $sql . ' and ';
                $sql = $sql . 'daily_rent <= ' . '\'' . (float)$rent . '\'';
            }

            if ($office !== "") {
                if ($and_index++ > 0)
                    $sql = $sql . ' and ';
                $sql = $sql . 'office = ' . '\'' . $office . '\'';
            }


            if ($and_index == 0)
                $sql = $sql . ' 1 ';

            $records = mysqli_query($db, $sql);


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

    </form>

    <button><a href="search.php">Back</a></button>
</div>
</body>
</html>