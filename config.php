<?php
$server = "localhost";
$username = "username_database"; 
$password = "password_database"; 
$database = "alecto_database"; 
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}
?>
