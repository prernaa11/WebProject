<?php
include '../db.php';
$id = $_GET['id'];
mysqli_query($conn, "UPDATE events SET status='rejected' WHERE id=$id");
header('Location: view_events.php');
?>