<!DOCTYPE html>
<html>
<head>
    <title>Customer report</title>
    <link rel="stylesheet" type="text/css" href="reports.css">

</head>
<body>
    <h2 id="cus_label">Customer report </h2>
<div>
    <form name="Customer_report" method="post" action="cus_report_res.php" onsubmit="">

    <label for="name" >Customer Email</label>
    <select id="email" name="email" REQUIRED>
            <option value="">Select Customer Email</option>
            <?php
            session_start();
            $db = mysqli_connect("localhost", "root", "", "crs");
            if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
            }       
            $q="SELECT email FROM sys_user ";
            $records = mysqli_query($db, $q);
            while ($rs = mysqli_fetch_array($records)) 
                   echo "<option value='" . $rs['email'] . "'>" . $rs['email'] . "</option>";
            ?>
        </select>

    <button type="submit" id="search" name="search">Search</button>
    </form>
    <br><br>
    <button type="text" id="back" name="back"><a href="report.html" style="color: black;text-decoration: none;">Back </a></button>

</div>

</body>
</html>