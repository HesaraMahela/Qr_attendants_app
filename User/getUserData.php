<?php

include '../conn.php';
header("Content-Type: application/json; charset=UTF-8");


$userName= $_POST['userName'];

$sql ="SELECT * FROM `student`
INNER join degree on student.degID = degree.degID
WHERE `st_username` = '$userName'
;";

//echo  $sql;
$result = $conn->query($sql);

$x = $result->num_rows;




if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        
                $myObj=new \stdClass();
                $myObj->st_no =$row["st_no"];
                $myObj->st_name =$row["st_name"];
                $myObj->degree =$row["degName"];
                $myObj->batch =$row["batchNo"];
                $myObj->imgPath =$row["imgPath"];
                $myJSON = json_encode($myObj);
                echo $myJSON;
                if($x <= 1){
                      echo "\n";
                  }else{
                       echo ",\n"; 
                  }
                 $x--;
            }
    }



    
     
    
mysqli_close($conn);
?>