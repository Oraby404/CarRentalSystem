<!DOCTYPE>
<html>
<head>
    <title>Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</head>
<body>
<table class="table table-striped">
    <tr>
        <th>Plate_id</th>
        <th>Car Manufacturer</th>
        <th>Model</th>
        <th>Year</th>
        <th>Status</th>
        <th>Daily Rent</th>
        <th>Distance Covered</th>
        <th>Office</th>
    </tr>
    <?php
    $db = mysqli_connect("localhost", "root", "", "crs");
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $plate_id = $_POST["plate_id"];
    $car_manufacturer = $_POST["car_manufacturer"];
    $year = $_POST["year"];
    $distance = $_POST["distance"];
    $rent = $_POST["rent"];
    $office = $_POST["office"];
    $car_status = $_POST["car_status"];

    $sql = "SELECT * FROM car WHERE ";

    $and_index = 0;
    if ($plate_id !== "") {
        $and_index = 1;
        $sql = $sql . 'car_plate_id = ' . '\'' . $plate_id . '\'';
    }

    if ($car_manufacturer !== "") {
        if ($and_index++ > 0)
            $sql = $sql . ' and ';
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

    if ($car_status !== "") {
        if ($and_index++ > 0)
            $sql = $sql . ' and ';
        $sql = $sql . 'car_status = ' . '\'' . $car_status . '\'';
    }

    if ($and_index == 0)
        $sql = $sql . ' 1 ';

    $records = mysqli_query($db, $sql);


    if (mysqli_num_rows($records) > 0) {
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr><td>" . $row["car_plate_id"] . "</td><td>" . $row["car_manufacture"] . "</td><td>" . $row["car_model"] . "</td><td>" . $row["car_year"] . "</td><td>" . $row["car_status"] . "</td><td>" . $row["daily_rent"] . "</td><td>" . $row["distance_covered"] . "</td><td>" . $row["office"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>No Car Found with this specs!</h1>";
    }
    echo "<br><button id='back' name='back'><a href='admin_portal.html'>Back </a></button>";
    $db->close();
    ?>
</table>
</body>
</html>