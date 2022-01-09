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
        <th>Car Plate ID</th>
        <th>Customer Email</th>
        <th>Reservation Date</th>
    </tr>
    <?php
    $db = mysqli_connect("localhost", "root", "", "crs");
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $plate_id = $_POST["plate_id"];
    $customer_email = $_POST["customer_email"];
    $reservation_date = $_POST["reservation_date"];


    $sql = "SELECT * FROM reservation NATURAL JOIN sys_user NATURAL JOIN car WHERE ";

    $and_index = 0;
    if ($plate_id !== "") {
        $and_index = 1;
        $sql = $sql . 'car_plate_id = ' . '\'' . $plate_id . '\'';
    }

    if ($customer_email !== "") {
        if ($and_index++ > 0)
            $sql = $sql . ' and ';
        $sql = $sql . ' email = ' . '\'' . $customer_email . '\'';
    }
    if ($reservation_date !== "") {
        if ($and_index++ > 0)
            $sql = $sql . ' and ';
        $sql = $sql . ' reservation_day >= ' . '\'' . $reservation_date . '\'';
    }

    if ($and_index == 0)
        $sql = $sql . ' 1 ';

    $records = mysqli_query($db, $sql);

    if (mysqli_num_rows($records) > 0) {
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr><td>" . $row["car_plate_id"] . "</td><td>" . $row["email"] . "</td><td>" . $row["reservation_day"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>No Reservations Found with this Info!</h1>";
    }
    $db->close();
    echo "<br><button id='back' name='back'><a href='admin_portal.html'>Back </a></button>";
    ?>
</table>
</body>
</html>