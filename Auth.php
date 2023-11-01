<?php

include 'conn.php';


header("Content-Type: application/json; charset=UTF-8");

$userName= $_POST['userName'];
//-----------------encrpt password----------------------------
$password = mysqli_real_escape_string($conn, $_POST["password"]);  

$encryptedPassword = md5($password);

//echo $encryptedPassword;

$sql = "SELECT * FROM `student` WHERE ( `st_username` ='$userName' AND `password` = '$encryptedPassword' );";
//echo $sql;


$result = $conn->query($sql);


$myObj=new \stdClass();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {


       // $role=$row["role"];
        $myObj->success = "true";
        $myObj->st_username = $row["st_username"];

        $myJSON = json_encode($myObj);
        echo $myJSON;
    }
    }else
    {
        
        $myObj->success ="false";
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }


mysqli_close($conn);
?>