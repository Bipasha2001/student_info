<?php
$db_host="localhost";
$db_username="root";
$db_password="password";
$db_name="sis";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

