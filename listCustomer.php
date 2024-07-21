<?php
	include 'dbconnect.php';
	
	$query= "SELECT * FROM customers ORDER BY surname";
	
	$result = mysqli_query($conn, $query);	
	
	if (!$result) {
		$error = "No customer was found in the database!";
	}
	
	while($data = mysqli_fetch_row($result)) {
		echo("<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td></tr>");
	}
?>