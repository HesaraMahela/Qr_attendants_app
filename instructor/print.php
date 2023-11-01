<?php 
    require 'validator.php';
    require_once 'conn.php'
?>

<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
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
	<body onload="window.print()">

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">	
						<div class="col-md-12">
							<div class="card">
								<div class="card-body pt-0">

									<!-- Tab Menu -->
									<br>
									<center><h3>Appointment Details</h3></center>
									<br>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->

                                    <!-- /Appointment Tab -->
									<div class="tab-content pt-0">

                                    <div id="all_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">

														<?php

															$aid = $_REQUEST["aid"];
															require_once("config2.php"); 
															$z = $conn->query("SELECT * FROM `appointments` INNER JOIN doctor on appointments.id = doctor.id WHERE appointments.`aid` = '$aid' ORDER BY aid ASC") or die ($conn->error());
															while($row = $z->fetch_array()){

														?>

															<thead>
																<br>
																<b style="margin-left:25px;">Name of Doctor:</b> <?php echo $row['dname']; ?><b style="margin-left:25px;">Specilaize:</b> <?php echo $row['name']; ?> <b style="margin-left:25px;">Status:</b>
																<?php

																		$stat = $row['a_status'];

																		if($stat == "Pending")
																		{?>
																			<span style="margin-left:5px;" class="badge badge-pill bg-warning-light">Pending</span>
															<?php		}

																		if($stat == "Confirm")
																		{?>
																			<span style="margin-left:5px;" class="badge badge-pill bg-success-light">Confirm</span>
															<?php		}

																		if($stat == "Rejected")
																		{?>
																			<span style="margin-left:5px;" class="badge badge-pill bg-danger-light">Rejected</span>
															<?php		}

																		if($stat == "Canceled")
																		{?>
																			<span style="margin-left:5px;" class="badge badge-pill bg-danger-light">Canceled</span>
															<?php		}

																		if($stat == "Completed")
																		{?>
																			<span style="margin-left:5px;" class="badge badge-pill bg-info-light">Completed</span>
															<?php		}

																	?>
																<br>
																<b style="margin-left:25px;">Doctor Mobile:</b> <?php echo $row['mobile']; ?>
															</thead>
															<br>
															<tbody>
																<br>
																<tr>
																	<th>Name of Patient</th>
																	<th>Patient Mobile</th>
																	<th>Address</th>
																	<th>Reason</th>
																	<th>Appt.Date & Time</th>
																</tr>
																<tr>
																	<td><?php echo $row['p_name']; ?></td>
																	<td><?php echo $row['p_mobile']; ?></td>
																	<td><?php echo $row['p_address']; ?></td>
																	<td><?php echo $row['reason']; ?></td>
																	<td><?php echo $row['date']; ?> <span class="d-block text-info"><?php echo $row['time']; ?></span></td>
																</tr>

																<tr>
																	<th></th>
																	<th></th>
																	<th></th>
																	<th>Total: <td><b>Rs.<?php echo $row['total']; ?></b></td></th>
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

		<!-- Edit Details Modal-->
		<div class="modal fade" id="edit_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Change Appointment</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<?php

								$aid = $_REQUEST["aid"];
								$query2 = mysqli_query($conn, "SELECT * FROM `appointments` WHERE `aid` = '$aid'") or die(mysqli_error());
								$fetch2 = mysqli_fetch_array($query2);

						?>

						<div class="modal-body">
							<form method="POST" action="appt.php" enctype="multipart/form-data">
								<div class="row form-row">
									<div class="col-12">
										<div class="form-group" style="display:none;">
											<label>Appt ID</label>
											<input type="text" name="aid" class="form-control" readonly="true" required="" value="<?php echo $fetch2['aid']; ?>">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Patient Name</label>
											<input type="text" name="pname" class="form-control" required="" value="<?php echo $fetch2['p_name']; ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Email</label>
											<input type="text" name="email" class="form-control" required="" value="<?php echo $fetch2['p_email']; ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Mobile</label>
											<input type="text" name="mobile" class="form-control" required="" value="<?php echo $fetch2['p_mobile']; ?>">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Address</label>
											<input type="text" name="address" class="form-control" required="" value="<?php echo $fetch2['p_address']; ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Date</label>
											<input type="date" name="date" class="form-control" required="" value="<?php echo $fetch2['date']; ?>">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Time</label>
											<input type="time" name="time" class="form-control" required="" value="<?php echo $fetch2['time']; ?>">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Reason</label>
											<textarea required="" class="form-control" type="text" name="reason" value="<?php echo $fetch2['reason']; ?>"></textarea>
										</div>
												</div>
									<div class="col-12">
										<div class="form-group">
											<label>Status</label>
											<select class="form-control" name="status" required="">
												<option value="Pending">Modify</option>
												<option value="Canceled">Cancel Appt</option>
											</select>
										</div>
									</div>
									
								</div>
								<button type="submit" name="edit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--/Edit Details Modal -->
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