<?php
	$conn = mysqli_connect("localhost:3307", "root", "root", "qr_attendance_db");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	
	$default_query = mysqli_query($conn, "SELECT * FROM `instructors`") or die(mysqli_error());
	$check_default = mysqli_num_rows($default_query);

?>