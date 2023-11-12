<?php 
    require 'validator.php';
    require_once 'conn.php'
?>

<!DOCTYPE html> 
<html lang="en">
	
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
											<img class="rounded-circle" src="../<?php echo $img; ?>" width="31" alt="">
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
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<?php

				  date_default_timezone_set("Asia/Colombo");
                  $today = date('Y-m-d');

			?>
			
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
											<li class="active">
												<a href="home.php">
													<i class="fas fa-columns"></i>
													<span>All Lectures</span>
												</a>
											</li>
											<li>
												<a href="today.php">
													<i class="fas fa-calendar-check"></i>
													<span>Todays Lectures</span>
												</a>
											</li>
											<li>
												<a href="upcoming.php">
													<i class="fas fa-calendar"></i>
													<span>Upcoming Lectures</span>
												</a>
											</li>
											<li>
												<a href="finished.php">
													<i class="fa fa-window-maximize"></i>
													<span>Completed Lectures</span>
												</a>
											</li>
											<li>
												<a href="change-password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
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

						<?php

										require_once("conn.php");
										$m_code = $fetch['m_code'];

										$query1 = mysqli_query($conn, "SELECT * FROM `enrollment` INNER JOIN batch on enrollment.batchNo = batch.batchNo WHERE m_code = '$m_code'") or die(mysqli_error());
                            			$batch = mysqli_num_rows($query1);

										$query2 = mysqli_query($conn, "SELECT * FROM `lecture` WHERE m_code = '$m_code'") or die(mysqli_error());
                            			$lectures = mysqli_num_rows($query2);

										$query3 = mysqli_query($conn, "SELECT * FROM `instructors` WHERE m_code = '$m_code'") or die(mysqli_error());
                            			$instructors = mysqli_num_rows($query3);
										
										

						?>

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="<?php echo $batch; ?>">
																<img src="assets/img/sign-up.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Enrolled Batches</h6>
															<h3><?php echo $batch; ?></h3>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="<?php echo $lectures; ?>">
																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Lectures</h6>
															<h3><?php echo $lectures; ?></h3>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="<?php echo $instructors; ?>">
																<img src="assets/img/instructor.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Instructors</h6>
															<h3><?php echo $instructors; ?></h3>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>



							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">List of Lectures</h4>

										<div class="appointment-tab">

											<div class="tab-content">
												
												<!-- All Lectures Tab -->
												<div class="tab-pane show active" id="all-lectures">
													<div class="card card-table mb-0">
														<div class="card-body">
															<div class="table-responsive">
																<table class="table table-hover table-center mb-0">
																	<thead>
																		<tr>
																			<th>Lecture ID</th>
																			<th>Start Time</th>
																			<th>End Time</th>
																			<th>Status</th>
																			<th>Action</th>
																	</tr>
																	</thead>
																	<tbody>

																<?php

																	$m_code = $fetch['m_code'];
																	$ins_id = $fetch['ins_id'];
																	//$s_time = date("Y-m-d",strtotime($row['e_time']));
																	//$currentdate = date('Y-m-d');


                                                                

																	$z = $conn->query("SELECT * FROM lecture INNER JOIN module on lecture.m_code = module.m_code WHERE lecture.m_code = '$m_code' AND ins_id = '$ins_id' ORDER BY lec_id ASC") or die ($conn->error());

																	while($row = $z->fetch_array()){

																?>

																	<tr>
																		<td><?php echo $row['lec_id']; ?></td>
																		<td><?php echo $row['s_time']; ?></td>
																		<td><?php echo $row['e_time']; ?></td>
																		<td>
																			<?php 
																				$s_date_time = $row['e_time']; 
																				$currentdate_time = date('Y-m-d H:i:s');

																				$s_date = date("Y-m-d",strtotime($row['e_time'])); 
																				$currentdate = date('Y-m-d');

																				if($s_date == $currentdate)
																				{
																					if($s_date_time > $currentdate_time)
																					{?>
																						<span class="badge badge-pill bg-success-light">Today</span>
																			<?php	}
																					else
																					{?>
																						<span class="badge badge-pill bg-danger-light">Completed</span>
																			<?php	}
																				}
																				if($s_date > $currentdate)
																				{?>
																					<span class="badge badge-pill bg-info-light">Upcoming</span>
																	   <?php	}
																			if($s_date < $currentdate)
																				{?>
																					<span class="badge badge-pill bg-danger-light">Completed</span>
																	   <?php	}
																			?>
																		</td>
																		<td>
																			<div class="table-action">
																				<a href="view.php?lec_id=<?php echo $row['lec_id']; ?>" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																			</div>
																		</td>
																	</tr>
																	<?php

																	}


																	?>
																</tbody>
															</table>
															<div>
														</div>
													</div>
												</div>
												<!-- All Lectures Tab -->
											</div>
										</div>
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
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>


</html>