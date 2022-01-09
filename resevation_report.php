<!DOCTYPE html>
<html>
<head>
    <title>reservation report</title>
    <link rel="stylesheet" type="text/css" href="reports.css">
    <script src="validate.js"></script>

</head>
<body>
    <h2 id="res_id">Reservation Report</h2>
<div>
    <form name="add_car" method="post" action="res_report_res.php" onsubmit=" return validatecustomerdate() ">

    <label for="Start">Start Date</label>
    <input type="date" id="start" name="start" required>
    <br><br>

    <label for="last">Last Date</label>
    <input type="date" id="last" name="last" required>
    <br><br>

    <select id="Car" name="Car"  style="margin-top: 20px;">
            <option value="">Select a Car</option>
            <?php
            session_start();
            $db = mysqli_connect("localhost", "root", "", "crs");
            if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
            }       
            $q="SELECT DISTINCT c.car_model FROM reservation as r NATURAL JOIN  car as c ";
            $records = mysqli_query($db, $q);
            while ($rs = mysqli_fetch_array($records)) {
                echo "<option value='" . $rs['car_model'] . "'>" . $rs['car_model'] . "</option>";
            }
            ?>
        </select>

    <button type="submit" id="search" name="search">Search</button>

</div>

</body>
</html>