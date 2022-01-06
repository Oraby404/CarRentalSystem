<!DOCTYPE html>
<html lang="en">
<head>
    <title>search for cars</title>
    <link rel="stylesheet" type="text/css" href="reserve.css">
    <script src="reserve.js"></script>
</head>

<body background="background.jpeg">
<h2>Find Your Car </h2>

<div>
    <form id="car_search" name="car_search" method="post" action="search.php">

        <label for="car_manufacturer">Car Manufacturer</label>
        <select id="car_manufacturer" name="car_manufacturer" required>
            <option value="">Select a Manufacturer</option>
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
        <label for="Car_model">Car Model</label>
        <select id="model" name="model" required>
            <option value="">Any</option>

            <?php

            $records = mysqli_query($db, "SELECT DISTINCT car_model FROM car");
            while ($rs = mysqli_fetch_array($records)) {
                echo "<option value='" . $rs['car_model'] . "'>" . $rs['car_model'] . "</option>";
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
            $q1 = mysqli_query($db, "SELECT Max(distance_covered) FROM car");
            $i = 10000;
            while ($i <= $q1) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
                $i += 5000;
            }
            ?>
        </select>

        <br><br>
        <label for="rent">Daily Rent</label>
        <select id="rent" name="rent">
            <option value="">Any</option>
            <?php
            $q1 = mysqli_query($db, "SELECT Max(daily_rent) FROM car");
            $i = 50;
            while ($i <= $q1) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
                $i += 50;
            }
            ?>
        </select>

        <br><br>
        <label for="office">Office</label>
        <select id="office" name="office" required>
            <option value="">Office</option>
            <?php
            $records = mysqli_query($db, "SELECT DISTINCT office FROM car");
            while ($rs = mysqli_fetch_array($records)) {
                echo "<option value='" . $rs['office'] . "'>" . $rs['office'] . "</option>";
            }
            ?><?php mysqli_close($db);  // close connection ?>
        </select>

        <br><br>

        <br><br>
        <button type="submit" id="search" name="search">Search</button>
        <br><br>

    </form>
</div>
</body>
</html>