<?php 
    require 'validator.php';
    require_once 'conn.php'
?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Attendance Mananagement System - Assign Modules</title>
		
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

				<div class="top-nav-search">
					<form method="POST" action="assign_modules.php">
						<input type="text" name="parm1" class="form-control" placeholder="Search">
						<button class="btn" type="submit" name="search1" ><i class="fa fa-search"></i></button>
					</form>
				</div>
				
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
							</div>
							<a class="dropdown-item" href="profile.php">My Profile</a>
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
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Assign Modules</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Assign Modules</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Persons" data-toggle="modal" class="btn btn-success float-right mt-2"> <i class="fa fa-plus-square" aria-hidden="true"></i> Assign Modules</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th class="text-left">Batch</th>
													<th class="text-left">Degree Programme Name</th>
													<th class="text-left">Module Name</th>
													<th class="text-center">Year</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>

												<?php

													if(ISSET($_POST['search1']))
													{
														$prm1 = $_POST['parm1'];

														if($prm1 == null)
														{
															$z = $conn->query("SELECT * FROM enrollment INNER JOIN degree on enrollment.degID = degree.degID INNER JOIN module on enrollment.m_code = module.m_code ORDER BY batchNo ASC") or die ($conn->error());
														}
														else
														{
															$z = $conn->query("SELECT * FROM enrollment INNER JOIN degree on enrollment.degID = degree.degID INNER JOIN module on enrollment.m_code = module.m_code WHERE batchNo = '$prm1' OR degName = '$prm1' OR m_name='$prm1' ORDER BY batchNo ASC") or die ($conn->error());
														}
                              							  while($row = $z->fetch_array())
                              							  {
                      								?>
													<td class="text-left">
														<h2 class="table-avatar">
															<p><?php echo $row['batchNo']; ?></p>
														</h2>
													</td>

													<td class="text-left">
														<h2 class="table-avatar">
															<p><?php echo $row['degName']; ?></p>
														</h2>
													</td>

													<td class="text-left">
														<h2 class="table-avatar">
															<p><?php echo $row['m_name']; ?></p>
														</h2>
													</td>

													<td class="text-center">
														<h2 class="table-avatar">
															<p><?php echo $row['enYear']; ?></p>
														</h2>
													</td>
												
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="dg_edit.php?degID=<?php echo $row['degID']; ?>">
																<i class="fe fe-eye"></i> View
															</a>
														</div>
													</td>
												</tr>

											<?php } 
													}
                          							else
                          							{ 
                          							  $z = $conn->query("SELECT * FROM enrollment INNER JOIN degree on enrollment.degID = degree.degID INNER JOIN module on enrollment.m_code = module.m_code ORDER BY batchNo ASC") or die ($conn->error());
                          							      while($row = $z->fetch_array()){
                      							?>
													
													<td class="text-left">
														<h2 class="table-avatar">
															<p><?php echo $row['batchNo']; ?></p>
														</h2>
													</td>

													<td class="text-left">
														<h2 class="table-avatar">
															<p><?php echo $row['degName']; ?></p>
														</h2>
													</td>

													<td class="text-left">
														<h2 class="table-avatar">
															<p><?php echo $row['m_name']; ?></p>
														</h2>
													</td>

													<td class="text-center">
														<h2 class="table-avatar">
															<p><?php echo $row['enYear']; ?></p>
														</h2>
													</td>
												
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="assign_edit.php?batchNo=<?php echo $row['batchNo']; ?>&degID=<?php echo $row['degID']; ?>&m_code=<?php echo $row['m_code']; ?>">
																<i class="fe fe-eye"></i> View
															</a>
														</div>
													</td>
												</tr>

												<?php } 

                          						} ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Persons" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Assign Modules</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="new_assign.php" enctype="multipart/form-data">
								<div class="row form-row">

								<?php
									
								    require_once 'select_controller.php';

									$db_handle = new DBController();
									$countryResult = $db_handle->runQuery("SELECT * FROM batch ORDER BY batchNo ASC");
									$countryResult1 = $db_handle->runQuery("SELECT * FROM degree ORDER BY degID ASC");
									$countryResult2 = $db_handle->runQuery("SELECT * FROM module ORDER BY m_code ASC");
								?>

									<div class="col-12">
										<div class="form-group">
											<label>Batch</label>
											<select name="batchNo" id="textbox1" class="form-control" required="">
												<option selected disabled>Select Module</option>
													<?php
                        								if (! empty($countryResult)) 
														{
                            								foreach ($countryResult as $key => $value) 
															{
                                								echo '<option value="' . $countryResult[$key]['batchNo'] . '">' . $countryResult[$key]['batchNo'] . '</option>';
                            								}
                        								}
                        							?>
											</select>
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Degree Programme Name</label>
											<select name="degID" id="textbox1" class="form-control" required="">
												<option selected disabled>Select Module</option>
													<?php
                        								if (! empty($countryResult1)) 
														{
                            								foreach ($countryResult1 as $key => $value) 
															{
                                								echo '<option value="' . $countryResult1[$key]['degID'] . '">' . $countryResult1[$key]['degName'] . '</option>';
                            								}
                        								}
                        							?>
											</select>
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Module Name</label>
											<select name="m_code" id="textbox1" class="form-control" required="">
												<option selected disabled>Select Module</option>
													<?php
                        								if (! empty($countryResult2)) 
														{
                            								foreach ($countryResult2 as $key => $value) 
															{
                                								echo '<option value="' . $countryResult2[$key]['m_code'] . '">' . $countryResult2[$key]['m_name'] . '</option>';
                            								}
                        								}
                        							?>
											</select>
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<label>Intake Year</label>
											<input type="text" name="enYear" class="form-control" required="">
										</div>
									</div>
									
								</div>
								<button type="submit" name="save" class="btn btn-success btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Add Modal -->
			
        </div>
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
</html>