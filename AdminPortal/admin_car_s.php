<!DOCTYPE html>
<html lang="en">
<head>
    <title>Car Search</title>
    <link rel="stylesheet" type="text/css" href="reserve.css">
    <script src="reserve.js"></script>
</head>

<body>

<h2>Car Search</h2>

<div>
    <form name="car_search" method="post" action="car_result.php">

        <label for="plate_id">Plate Id</label>
        <input type="text" name="plate_id" id="plate_id" maxlength="7" minlength="7" placeholder="Any"/>
        <br><br>

        <label for="car_manufacturer">Car Manufacturer</label>
        <select id="car_manufacturer" name="car_manufacturer">
            <option value="">Any</option>
            <?php
            $db = mysqli_connect("localhost", "root", "", "crs");
            if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $records = mysqli_query($db, "SELECT DISTINCT car_manufacture FROM car");
            while ($rs = mysqli_fetch_array($records)) {
                echo "<option value='" . $rs['car_manufacture'] . "'>" . $rs['car_manufacture'] . "</option>";
            }
            ?>
        </select>

        <br><br>

        <label for="year">Model Year</label>
        <select id="year" name="year">
            <option value="">Any</option>
        </select>

        <br><br>

        <label for="distance">Distance Covered</label>
        <select id="distance" name="distance">
            <option value="">Any</option>
            <?php
            $record = mysqli_query($db, "SELECT max(distance_covered) as max_distance FROM car");
            $row = mysqli_fetch_array($record);
            $q1 = $row['max_distance'];
            while ($q1 >= 25000) {
                echo "<option value=" . $q1 . "> " . '< ' . $q1 . "</option>";
                $q1 -= 25000;
            }
            ?>
        </select>

        <br><br>

        <label for="rent">Daily Rent</label>
        <select id="rent" name="rent">
            <option value="">Any</option>
            <?php
            $record = mysqli_query($db, "SELECT max(daily_rent) as max_rent FROM car");
            $row = mysqli_fetch_array($record);
            $q1 = $row['max_rent'] * 1;
            while ($q1 >= 50) {
                echo "<option value=" . $q1 . ">" . '< ' . $q1 . "</option>";
                $q1 -= 50;
            }
            ?>
        </select>

        <br><br>

        <label for="office">Office</label>
        <select id="office" name="office">
            <option value="">Any</option>
            <?php
            $records = mysqli_query($db, "SELECT DISTINCT office FROM car");
            while ($rs = mysqli_fetch_array($records)) {
                echo "<option value=" . $rs['office'] . ">" . $rs['office'] . "</option>";
            }
            ?>

            <?php mysqli_close($db);  // close connection ?>
        </select>

        <br><br>

        <label for="car_status">Car Status</label>
        <select id="car_status" name="car_status">
            <option value="">Any</option>
            <option value="ACTIVE">Active</option>
            <option value="OUTOFSERVICE">Out of service</option>
        </select>

        <br><br>
        <button type="submit" id="search" name="search">Search</button>
        <br><br>

    </form>
    <button><a href="admin_search.html">Back</a></button>
</div>
</body>
</html>