<?php
header('Content-Type: application/json');

include ("../connect.php");

$sqlQuery = "SELECT  Date(timestamp) as timestamp, count(id) as v from sale group by Date(timestamp) DESC LIMIT 7";

$result = mysqli_query($conn, $sqlQuery);

 if(mysqli_num_rows($result) > 0) 
 {
 	$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
print json_encode($data);
 }
?>
