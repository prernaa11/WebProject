<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "corporate_event";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>