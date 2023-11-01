<?php
	$conn = mysqli_connect("localhost:3307", "root", "root", "qr_attendance_db");
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>