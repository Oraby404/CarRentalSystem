<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$my_email = $_POST["email"];
$my_password = $_POST["password"];

$sql = "SELECT * FROM sys_user WHERE email='$my_email' and user_password='$my_password' ";

if ($result = $conn->query($sql)) {
    $row = $result->fetch_assoc();
    if ($row) {
        session_start();
        $_SESSION['user_id'] = $row;
        $_SESSION['search'] = 1;
        $_SESSION['res_period'] = 1;

        if ($row['user_role'] == 'ADMIN')
            header('location:http://localhost/Final_project/AdminPortal/admin_portal.html');
        else
            header('location:search.php');
    } else {
        echo "<h1>Account Does not Exist!</h1><br>";
        echo '<a href="login.html">Back</a>';
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();