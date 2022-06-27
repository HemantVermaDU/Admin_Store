<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname="mindstein_storeadmin";

// $servername = "119.18.52.191";
// $username = "mindstei_storeadmin";
// $password = "mindstein@0291@";
// $dbname= "mindstei_storeadmin";

$conn = mysqli_connect($servername, $username, $password,$dbname);

 date_default_timezone_set("Asia/Kolkata");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 ?>