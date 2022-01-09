<!DOCTYPE>
<html>
<head>
    <title>Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<table class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Registration Date</th>
    </tr>
    <?php
    $db = mysqli_connect("localhost", "root", "", "crs");
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $customer_name = $_POST["customer_name"];
    $customer_email = $_POST["customer_email"];
    $registration_date = $_POST["registration_date"];


    $sql = "SELECT * FROM sys_user WHERE ";

    $and_index = 0;
    if ($customer_name !== "") {
        $and_index = 1;
        $sql = $sql . ' user_name = ' . '\'' . $customer_name . '\'';
    }

    if ($customer_email !== "") {
        if ($and_index++ > 0)
            $sql = $sql . ' and ';
        $sql = $sql . ' email = ' . '\'' . $customer_email . '\'';
    }
    if ($registration_date !== "") {
        if ($and_index++ > 0)
            $sql = $sql . ' and ';
        $sql = $sql . ' registration_date >= ' . '\'' . $registration_date . '\'';
    }

    if ($and_index== 0)
        $sql = $sql . ' 1 ';

    $records = mysqli_query($db, $sql);

    if (mysqli_num_rows($records) > 0) {
        while ($row = mysqli_fetch_array($records)) {
            echo "<tr><td>" . $row["user_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["registration_date"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>No Customers Found with this Info!</h1>";
    }
    echo "<br><button id='back' name='back'><a href='admin_portal.html'>Back </a></button>";
    $db->close();
    ?>
</table>
</body>
</html>