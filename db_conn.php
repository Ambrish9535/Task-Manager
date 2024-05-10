<?php
$sname = "localhost";
$uname = "root";
$password = "ambi9611";
$db_name = "taskmanager";

// Establishing the database connection
$conn = new mysqli($sname, $uname, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
