<?php
$con=mysqli_connect('localhost','root','','corporate_event')OR die('couldnot connect to mysqli server');
session_name('auth');
session_start();
require_once('includes/validation.php');
?>