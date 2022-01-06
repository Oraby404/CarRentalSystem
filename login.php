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
        $str = "Welcome " . $row["user_name"];
        echo "<h1>$str</h1><br>";
        echo '<a href="login.html">Signout</a>';
    } else {
        echo "<h1>Account Does not Exist!</h1><br>";
        echo '<a href="login.html">Back</a>';
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();