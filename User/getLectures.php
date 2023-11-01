<?php

include '../conn.php';
header("Content-Type: application/json; charset=UTF-8");

$userName= $_POST['userName'];


$sql ="SELECT *, cast(lecture.s_time as time) as 'time_start', cast(lecture.e_time as time) as 'time_end' , 
if ( lecture.e_time < CURRENT_TIMESTAMP,'true','false'  ) as 'expaired'    
FROM `lecture`
INNER join module on lecture.m_code = module.m_code
INNER JOIN enrollment on module.m_code = enrollment.m_code
INNER JOIN student on enrollment.degID = student.degID
INNER JOIN instructors on lecture.ins_id = instructors.ins_id

Where cast(lecture.s_time as date) = CURRENT_DATE
AND (student.st_username = '$userName')";

$result = $conn->query($sql);

$x = $result->num_rows;



 $dataset = array();
if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        
               array_push($dataset, array(

                "lec_id"=> $row["lec_id"],

                "m_code"=> $row["m_code"],

                "m_name"=> $row["m_name"],

                "m_description"=> $row["description"],

                "time_start"=> $row["time_start"],

                "time_end"=> $row["time_end"],

                "expired"=> $row["expaired"],
                
                "instructor"=> $row["firstname"]
    

                ));
           
            }



    }


echo json_encode($dataset, JSON_NUMERIC_CHECK); 


    
     
    
mysqli_close($conn);
?>