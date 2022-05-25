<?php
include("includes/db.php");

$query = "SELECT * from status";					// Select all data in table "status"
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
	echo $row["status"];					// Echo data , equivalent with send data to esp
}
