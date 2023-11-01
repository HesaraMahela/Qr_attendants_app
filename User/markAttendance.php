<?php
include '../conn.php';
header("Content-Type: application/json; charset=UTF-8");
 
$userName= $_POST['userName'];
$lec_id= $_POST['lec_id'];
$lat= $_POST['lat'];
$lng= $_POST['lng'];
$ispresent= $_POST['ispresent'];


$sql = "INSERT INTO `attendance` (`st_username`, `lec_id`, `lat`, `lng`, `check_in`, `ispresent`) 
VALUES ('$userName', '$lec_id', '$lat', '$lng', current_timestamp(), '$ispresent');";


//echo $sql;





if(mysqli_query($conn, $sql)){
    $myObj=new \stdClass();
    $myObj->success = 'true';
    $myJSON = json_encode($myObj);
    echo $myJSON;
} else{
    $myObj=new \stdClass();
    $myObj->success = 'false';
    $myJSON = json_encode($myObj);
    echo $myJSON;
}

?>