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
						 <?php
                    			$st_username = $_REQUEST["st_username"];
                    			$query1 = mysqli_query($conn, "SELECT * FROM student INNER JOIN degree on student.degID = degree.degID WHERE `st_username` = '$st_username'") or die(mysqli_error());
                    			$fetch1 = mysqli_fetch_array($query1);
                    	?>


<h5 class="page-title" style="margin-top:10px; margin-left:25%; margin-bottom:50px; width:50%;">
	<div class="row form-row">

		<div class="col-12">
				<h4 class="table-avatar" style="margin-top:50px; width:50%; margin-bottom:50px;">
					<?php
						$img = $fetch1['imgPath']; ?>

			</h4>

	</div>

</h5>

</div>
					</div>
			
			<!-- Edit Details Modal-->
            <div class="container">
                <div class="row d-flex justify-content-center text-center ">
			<div class="col-md-6 " id="edit_details"  >

						<div class="row">
							<h5 class="title">Edit Student Details</h5>
						</div>
						<div class="card-body">
							<form method="POST" action="new_student.php" enctype="multipart/form-data">
								<div class="row form-row">

								<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Student Name</label>
											<input style="display:none;" type="text" name="st_username" class="form-control" required="" readonly="true" value="<?php echo $fetch1['st_username']; ?>">
											<input type="text" name="st_name" class="form-control" required="" value="<?php echo $fetch1['st_name']; ?>">
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
									$defult_batch = $fetch1['batchNo'];
									$defult_degree = $fetch1['degName'];
									$db_handle = new DBController();
									$countryResult = $db_handle->runQuery("SELECT * FROM batch WHERE batchNo != '$defult_batch' ORDER BY batchNo ASC");
									$countryResult2 = $db_handle->runQuery("SELECT * FROM degree WHERE degName != '$defult_degree' ORDER BY degName ASC");
								?>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Batch</label>
											<select name="batchNo" id="textbox1" class="form-control" required="">
												<option value="<?php echo $fetch1['batchNo']; ?>" selected><?php echo $fetch1['batchNo']; ?></option>
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
											<label>Degree Programme</label>
											<select name="degName" id="textbox1" class="form-control" required="">
												<option value="<?php echo $fetch1['degID']; ?>" selected><?php echo $fetch1['degName']; ?></option>
													<?php
                        								if (! empty($countryResult2)) 
														{
                            								foreach ($countryResult2 as $key => $value) 
															{
                                								echo '<option value="' . $countryResult2[$key]['degID'] . '">' . $countryResult2[$key]['degName'] . '</option>';
                            								}
                        								}
                        							?>
											</select>
										</div>
									</div>

									<div class="col-12">
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