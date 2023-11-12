<?php 
    require 'validator.php';
    require_once 'conn.php'
?>

<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
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

		<style>
			.isDisabled 
			{
  				color: currentColor;
  				cursor: not-allowed;
  				opacity: 0.5;
  				text-decoration: none;
			}
		</style>
	
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
						<a href="index.php" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
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
									<li class="breadcrumb-item active" aria-current="page">Attendance</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Attendance</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

				<?php 

					$lec_id = $_REQUEST["lec_id"];

				?>

				<div class="row">	
						<div class="col-md-12">
							<div class="card">
								<div class="card-body pt-0">
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                            <h4 style="margin-top:25px; margin-bottom:25px;">View of Locations</h4>
										</ul>
									</nav>
									<?php require_once 'map.php'; ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">	
						<div class="col-md-12">
							<div class="card">
								<div class="card-body pt-0">
												
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                            <h4 style="margin-top:25px; margin-bottom:25px;">Instructor ID: <?php echo $lec_id; ?></h4>
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->

                                    <!-- /Appointment Tab -->
									<div class="tab-content pt-0">

                                    <div id="all_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																		<th>Student ID</th>
																		<th>Student Name</th>
																		<th>Batch</th>
																		<th>Degree Programme</th>
																		<th>Check In Time</th>
																		<th>Status</th>
																</tr>
															</thead>
															<tbody>

																<?php

																	$lec_id = $_REQUEST["lec_id"];
																	require_once("conn.php"); 
																	$z = $conn->query("SELECT * FROM `attendance` INNER JOIN student on attendance.st_username = student.st_username INNER JOIN degree on student.degID = degree.degID WHERE attendance.`lec_id` = '$lec_id' ORDER BY student.st_no ASC") or die ($conn->error());
																	while($row = $z->fetch_array()){

																?>

																<tr>
																	<td><?php echo $row['st_no']; ?></td>
																	<td>
																	<h2 class="table-avatar">
																		<?php
																			$img = $row['imgPath']; 

																			if($img == "C:")
																			{?>
																				<a href="#" class="avatar avatar-sm mr-2">
																					<img class="avatar-img rounded-circle" src="../assets/img/student/user.png">
																				</a>
																	<?php	}
																			else
																			{?>

																				<a href="<?php echo $img; ?>" class="avatar avatar-sm mr-2">
																					<img class="avatar-img rounded-circle" src="<?php echo $img; ?>">
																				</a>

																	<?php	}

																?>	
																			<?php echo $row['st_name']; ?>
																	</h2>
																	</td>
                                                                    <td><?php echo $row['batchNo']; ?></td>
																	<td><?php echo $row['degName']; ?></td>
																	<td><?php echo $row['check_in']; ?></td>
					
																	<td>
																	<?php

																		$stat = $row['ispresent'];

																		if($stat == "true")
																		{?>
																			<span class="badge badge-pill bg-success-light">Present</span>
															<?php		}

																		if($stat == "false")
																		{?>
																			<span class="badge badge-pill bg-danger-light">Absent</span>
															<?php		}

																	?>

																	</td>
																</tr>

																<?php

																	}

																	?>

															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
									</div>
									<!-- Tab Content -->
									
								</div>
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
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
</html>