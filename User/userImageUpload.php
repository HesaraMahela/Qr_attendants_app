<?php


include '../conn.php';
include '../uploadurl.php';


header("Content-Type: application/json; charset=UTF-8");
	$encodedImage = $_POST['image'];

	$userName =$_POST['userName'];

	$imageLocation = "../Images/User/$userName.jpg";
	
	$imagpath="Images/User/$userName.jpg";
	$uploade_url=$base_url.$imagpath;


	if(file_put_contents($imageLocation, base64_decode($encodedImage))){


	    	$sql="UPDATE `student` SET `imgPath` = '$uploade_url' WHERE `student`.`st_username` = '$userName';";
	    	
	    	
                if(mysqli_query($conn, $sql)){
					$myObj=new \stdClass();
                    $myObj->success = 'true';
                  
                    $myJSON = json_encode($myObj);
                    echo $myJSON;
                    
                }
	

	}else{

		$myObj->success = 'false';
                  
		$myJSON = json_encode($myObj);
		echo $myJSON;

	}




?>