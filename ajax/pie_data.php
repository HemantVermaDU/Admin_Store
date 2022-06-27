<?php
header('Content-Type: application/json');

include ("../connect.php");

$sqlQuery = "SELECT COUNT(DISTINCT store.id) as id1, COUNT(DISTINCT party.id) as id2 FROM store,party";

$result = mysqli_query($conn, $sqlQuery);

 if(mysqli_num_rows($result)) 
 {
 	$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
print json_encode($data);
 }
?>








