<?php
	session_start();
	require 'conn.php';
	
	if(ISSET($_POST['login'])){
		$ins_username = $_POST['ins_username'];
		$password = md5($_POST['password']);
		
//		$query = mysqli_query($conn, "SELECT * FROM `instructors` WHERE `ins_username` = '$ins_username' && `password` = '$password'") or die(mysqli_error());

        $query = mysqli_query($conn, "SELECT * FROM `instructors` WHERE `ins_username` = 'chalani' ") or die(mysqli_error());


        $fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;

		if($row > 0){
			$_SESSION['ins_id'] = $fetch['ins_id'];
			$_SESSION['firstname'] = $fetch['firstname'];
			header("location:home.php");
		}

		else if(empty($_POST["ins_username"]) && empty($_POST["password"]))
		{
			echo "<center><label class='text-danger'>Username & Password is Required</label></center>";
		}

		else
		{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
	}
?>