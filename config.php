<?php
$server = "localhost";
$username = "root"; 
$password = NULL; 
$database = "alecto"; 
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Connection to database failed: " . mysqli_connect_error());
}
?>
