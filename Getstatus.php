<?php
include("includes/db.php");

$query = "SELECT * from status";					// Select all data in table "status"
$result = mysqli_query($connection, $query);

$data_array = array();

while ($row = mysqli_fetch_assoc($result)) {
	$led_status = (int) $row["status"];

	$stdClass = new stdClass();
	$stdClass->led_status = $led_status;

	array_push($data_array, $stdClass);
}


$data_array = json_encode($data_array);
$data_array = trim($data_array, '[]');
echo $data_array;
