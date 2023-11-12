<?php 
    require 'validator.php';
    require_once 'conn.php'
?>


<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:03 GMT -->
<head>
		<meta charset="utf-8">
		<title>Attendance Mananagement System - Instructor</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="home.php" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="home.php" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
					</div>		 
					<ul class="nav header-navbar-rht">
						
						<!-- User Menu -->

						<?php 
                			$query = mysqli_query($conn, "SELECT * FROM `instructors` INNER JOIN module on instructors.m_code = module.m_code WHERE `ins_id` = '$_SESSION[ins_id]'") or die(mysqli_error());
                			$fetch = mysqli_fetch_array($query);
            			?>

						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<?php
										$img = $fetch['imgPath']; 
										if($img == "C:")
										{?>
											<img class="rounded-circle" src="../assets/img/lecture/user.png" width="31" alt="User">
								<?php	}
										else
										{?>
											<img class="rounded-circle" src="../<?php echo $img; ?>" width="31" alt="User">
							<?php		}
									?>
									
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<?php
											$img = $fetch['imgPath'];

											if($img == "C:")
											{?>
												<img src="../assets/img/lecture/user.png" alt="User Image" class="avatar-img rounded-circle">
									<?php	}
											else
											{?>
												<img src="../<?php echo $img; ?>" alt="User Image" class="avatar-img rounded-circle">
									<?php	}
										?>
										
										
									</div>
									<div class="user-text">
										<h6><?php echo $fetch['firstname']; ?></h6>
										<p class="text-muted mb-0"><?php echo $fetch['ins_id']; ?></p>
									</div>
								</div>
								<a class="dropdown-item" href="home.php">Dashboard</a>
								<a class="dropdown-item" href="profile-settings.php">Profile Settings</a>
								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">

										<?php

											$img = $fetch['imgPath'];

											if($img == "C:")
											{?>
												<a href="#" class="booking-doc-img">
													<img src="../assets/img/lecture/user.png" alt="User Image">
												</a>
									<?php   }
											else
											{?>
												<a href="#" class="booking-doc-img">
													<img src="../<?php echo $img; ?>" alt="User Image">
												</a>
									<?php	}

										?>
										
										<div class="profile-det-info">
											<h3><?php echo $fetch['firstname']; ?></h3>
											
											<div class="patient-details">
												<h5 class="mb-0"><?php echo $fetch['m_code']; ?> | <?php echo $fetch['m_name']; ?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="home.php">
													<i class="fas fa-columns"></i>
													<span>All Lectures</span>
												</a>
											</li>
											<li class="active">
												<a href="schedule.php">
													<i class="fas fa-plus"></i>
													<span>Schedule Lectures</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
                        <div class="col-md-7 col-lg-8 col-xl-9">
							<!-- Basic Information -->
							<form method="POST" action="add_schedule.php" enctype="multipart/form-data">
								<div class="card">
								<div class="card-body">
									<h4 class="card-title">Schedule Lectures</h4>
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Instructor ID</label>
												<input style="display: none;" type="text" class="form-control" name="ins_id" readonly="" value="<?php echo $fetch['ins_id']; ?>">
												<input type="text" class="form-control" name="lec_id" required="">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Module</label>
												<select class="form-control select" name="m_code" required="">
												<option selected disabled>Select Module</option>
                        <?php

						require_once 'select_controller.php';
						$db_handle = new DBController();
						$countryResult = $db_handle->runQuery("SELECT * FROM module ORDER BY m_code ASC");

                        if (! empty($countryResult)) {
                            foreach ($countryResult as $key => $value) {
                                echo '<option value="' . $countryResult[$key]['m_code'] . '">' . $countryResult[$key]['m_name'] . '</option>';
                            }
                        }
                        ?>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Start Time</label>
												<input type="datetime-local" class="form-control" name="s_time" required="">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>End Time</label>
												<input type="datetime-local" class="form-control" name="e_time" required="">
											</div>
										</div>

									</div>
								</div>
							</div>
							
							<!-- /Basic Information -->
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn" name="save">Save Changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>		
			<!-- /Page Content -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:09 GMT -->
</html>