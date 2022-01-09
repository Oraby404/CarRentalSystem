<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Search</title>
    <link rel="stylesheet" type="text/css" href="reserve.css">
    <script src="reserve.js"></script>
</head>

<body>

<h2>Customer Search</h2>

<div>
    <form name="customer_search" method="post" action="customer_results.php">

        <label for="customer_name">Name</label>
        <input type="text" name="customer_name" id="customer_name" placeholder="Any"/>
        <br><br>

        <label for="customer_email">E-mail</label>
        <input type="email" name="customer_email" id="customer_email" placeholder="Any"/>
        <br><br>

        <label for="registration_date">Registration Date</label>
        <input type="date" name="registration_date" id="registration_date"/>
        <br><br>

        <button type="submit" id="search" name="search">Search</button>
        <br><br>

    </form>
    <button><a href="admin_search.html">Back</a></button>
</div>
</body>
</html>