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
        <title>Attendance Mananagement System - Lectures</title>
		
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
						 <?php
                    			$ins_id = $_REQUEST["ins_id"]; 
                    			$query1 = mysqli_query($conn, "SELECT * FROM instructors INNER JOIN module on instructors.m_code = module.m_code WHERE `ins_id` = '$ins_id'") or die(mysqli_error());
                    			$fetch1 = mysqli_fetch_array($query1);
                    	?>

								<a href="#edit_details" data-toggle="modal" class="btn btn-success float-center"><i class="fe fe-pencil"></i> Edit</a> 
								<a href="#delete_modal" data-toggle="modal" class="btn btn-danger float-center"><i class="fe fe-trash"></i> Delete</a>

								<div class="row">

									<h5 class="page-title" style="margin-top:10px; margin-left:25%; margin-bottom:50px; width:50%;">
									<div class="row form-row">

										<div class="col-12">
											<h4 class="table-avatar" style="margin-top:50px; width:50%; margin-bottom:50px;">
												<?php
													$img = $fetch1['imgPath']; 
													if($img == "C:")
													{?>
														<center><a href="#" class="avatar avatar-sm mr-2">
														<img style="height:130px; width:150px; border-radius:50%; margin-left:160px;" class="avatar-img" src="assets/img/student/user.png">
														</a></center>
											<?php	}
													else
													{?>

														<center><a href="<?php echo $img; ?>" class="avatar avatar-sm mr-2">
														<img style="height:130px; width:150px; border-radius:50%; margin-left:160px;" class="avatar-img" src="<?php echo $img; ?>">
														</a></center>

											<?php	}

													?>
											</h4>
														<center><h4 class="page-title" style="margin-top:150px; width:100%; margin-bottom:25px;"><?php echo $fetch1['firstname']; ?></h4></center>
														<center><h4 class="page-title" style="width:100%; margin-bottom:50px;"><?php echo $fetch1['m_code']; ?> | <?php echo $fetch1['m_name']; ?></h4></center>
										</div>

										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label>Lecture ID</label>
												<input type="text" class="form-control" required="" readonly="true" value="<?php echo $fetch1['ins_id']; ?>">
											</div>
										</div>

										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label>Lecture Username</label>
												<input type="text" class="form-control" required="" readonly="true" value="<?php echo $fetch1['ins_username']; ?>">
											</div>
										</div>

									</div>

									</h5>

								</div>
					</div>
			
			<!-- Edit Details Modal-->
			<div class="modal fade" id="edit_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Lecture Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="new_lectures.php" enctype="multipart/form-data">
								<div class="row form-row">

								<div class="col-12">
										<div class="form-group">
											<label>Name of Lecture</label>
											<input style="display:none;" type="text" name="ins_id" class="form-control" required="" readonly="true" value="<?php echo $fetch1['ins_id']; ?>">
											<input type="text" name="firstname" class="form-control" required="" value="<?php echo $fetch1['firstname']; ?>">
										</div>
									</div>

									<?php
									class DBController 
									{
  										private $host = "localhost";
  										private $user = "root";
  										private $password = "";
  										private $database = "adms_db";
  										private $conn;
  
        								function __construct() 
										{
        									$this->conn = $this->connectDB();
  										}

  										function connectDB() 
										{
    										$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
    										return $conn;
  										}

        								function runQuery($query) 
										{
                							$result = mysqli_query($this->conn,$query);
                							while($row=mysqli_fetch_assoc($result)) 
											{
                								$resultset[] = $row;
                							}   
                							if(!empty($resultset))
                							return $resultset;
  										}
									}
									$defult_module = $fetch1['m_code'];
									$db_handle = new DBController();
									$countryResult = $db_handle->runQuery("SELECT * FROM module WHERE m_code != '$defult_module' ORDER BY m_code ASC");
								?>

									<div class="col-12">
										<div class="form-group">
											<label>Module</label>
											<select name="m_code" id="textbox1" class="form-control" required="">
												<option value="<?php echo $fetch1['m_code']; ?>" selected><?php echo $fetch1['m_name']; ?></option>
													<?php
                        								if (! empty($countryResult)) 
														{
                            								foreach ($countryResult as $key => $value) 
															{
                                								echo '<option value="' . $countryResult[$key]['m_code'] . '">' . $countryResult[$key]['m_name'] . '</option>';
                            								}
                        								}
                        							?>
											</select>
										</div>
									</div>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Username</label>
											<input type="text" name="ins_username" class="form-control" required="">
										</div>
									</div>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control" required="">
										</div>
									</div>
									
								</div>
								<button type="submit" name="edit" class="btn btn-primary btn-block">Update Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--/Edit Details Modal -->

			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete Student</h4>
								<p class="mb-4">Are you sure want to delete ?</p>

								<form method="POST" action="new_lectures.php" enctype="multipart/form-data">
									<input style="display: none;" type="text" name="ins_id" value="<?php echo $fetch1['ins_id']; ?>">
									<button type="submit" name="delete" class="btn btn-primary">Save </button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

		<script>
			let myText = document.getElementById("my-text");
			let result = document.getElementById("count-result");
			myText.addEventListener("input", () => {
    			let limit = 250;
    			let count = (myText.value).length;
    			document.getElementById("count-result").textContent = `${count} / ${limit}` ;

    			if(count > limit)
    			{
        			myText.style.borderColor = "#F08080";
					result.style.color = "#F08080";
    			}
				else
				{
					myText.style.borderColor = "#1ABC9C";
					result.style.color = "#333";
				}
			});
		</script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:51 GMT -->
</html>