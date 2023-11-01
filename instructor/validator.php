<?php
	session_start();
	
	if(!ISSET($_SESSION['ins_id'])){
		header("location: index.php");
	}
?>