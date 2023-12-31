<?php

    require 'validator.php';
    require_once 'conn.php';
?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Attendance Mananagement System - Students</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">

		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <div class="header">

				<!-- Logo -->
                <div class="header-left">
                    <a href="home.php" class="logo">
						<img src="assets/img/logo.png" alt="Logo">
					</a>
					<a href="home.php" class="logo logo-small">
						<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->

				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>

				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->

				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- User Menu -->

					<?php
                		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error());
                		$fetch = mysqli_fetch_array($query);
            		?>
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="<?php echo $fetch['img']; ?>" width="31" alt="User Image"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="<?php echo $fetch['img']; ?>" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php echo $fetch['firstname']; ?> <?php echo $fetch['lastname']; ?></h6>
									<p class="text-muted mb-0"><?php echo $fetch['status']; ?></p>
								</div>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->

				</ul>
				<!-- /Header Right Menu -->

            </div>
			<!-- /Header -->

			<!-- Sidebar -->
				<?php
    				require 'sidebar.php';
				?>
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						 <?php
                    			$st_username = $_REQUEST["st_username"];
                    			$query1 = mysqli_query($conn, "SELECT * FROM student INNER JOIN degree on student.degID = degree.degID WHERE `st_username` = '$st_username'") or die(mysqli_error());
                    			$fetch1 = mysqli_fetch_array($query1);
                    	?>



                    <!-- Delete Modal -->
                    <div class="container">
                        <div class="row d-flex justify-content-center text-center ">
                            <div class="col-4 " style="border: 10px;">

                                    <div class="card-body">
                                        <div class="form-content p-2">
                                            <h4 class="text-title">Delete Student</h4>
                                            <p class="mb-4">Are you sure want to delete ?</p>

                                            <form method="POST"  action="new_student.php" enctype="multipart/form-data">
                                                <input style="display: none;" type="text" name="st_username" value="<?php echo $fetch1['st_username']; ?>">
                                                <button type="submit" name="delete" class="btn btn-primary">Delete </button>
                                                <a type="button" href="javascript:history.back()" class="btn btn-danger" >Close</a>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>


                    <!--/Delete Modal -->

                    <!-- /Main Wrapper -->

                    <!-- jQuery -->
                    <script src="assets/js/jquery-3.2.1.min.js"></script>

                    <!-- Bootstrap Core JS -->
                    <script src="assets/js/popper.min.js"></script>
                    <script src="assets/js/bootstrap.min.js"></script>

                    <!-- Slimscroll JS -->
                    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

                    <!-- Datatables JS -->
                    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
                    <script src="assets/plugins/datatables/datatables.min.js"></script>

                    <!-- Custom JS -->
                    <script  src="assets/js/script.js"></script>


    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:51 GMT -->
</html>