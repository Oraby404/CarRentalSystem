<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reservation Search</title>
    <link rel="stylesheet" type="text/css" href="reserve.css">
    <script src="reserve.js"></script>
</head>

<body>

<h2>Reservation Search</h2>

<div>
    <form name="reservation_search" method="post" action="reservation_results.php">

        <label for="customer_email">E-mail</label>
        <input type="email" name="customer_email" id="customer_email" placeholder="Any"/>

        <br><br>

        <label for="plate_id">Plate Id</label>
        <input type="text" name="plate_id" id="plate_id" maxlength="7" minlength="7" placeholder="Any"/>

        <br><br>

        <label for="reservation_date">Reservation Date</label>
        <input type="date" name="reservation_date" id="reservation_date"/>

        <br><br>

        <button type="submit" id="search" name="search">Search</button>
        <br><br>

    </form>
    <button><a href="admin_search.html">Back</a></button>
</div>
</body>
</html>