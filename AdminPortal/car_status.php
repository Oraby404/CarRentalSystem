<!DOCTYPE html>
<html>
<head>
    <title>Car Satus</title>
    <link rel="stylesheet" type="text/css" href="reports.css">

</head>
<body>
    <h2>Car Status</h2>
<div>
    <form name="add_car" method="post" action="car_status_res.php" onsubmit="">

    <label for="Car_date">Date</label>
    <input type="date" id="date" name="date" required>
    <br><br>

    <button type="submit" id="search" name="search">Search</button>

    </form>
	<br><br>
    <button type="text" id="back" name="back"><a href="report.html" style="color: black;text-decoration: none;">Back </a></button>

</div>

</body>
</html>