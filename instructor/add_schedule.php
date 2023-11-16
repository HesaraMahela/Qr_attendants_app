<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $ins_id = $_POST['ins_id'];
        $lec_id = $_POST['lec_id'];
        $m_code = $_POST['m_code'];
        $s_time = $_POST['s_time'];
        $e_time = $_POST['e_time'];

            $sql = "INSERT INTO lecture (lec_id, m_code, s_time, e_time, ins_id) VALUES ('$lec_id','$m_code','$s_time','$e_time','$ins_id')";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Lecture Saved Successfully!");
                        window.location = "home.php";
                     </script>
                    ';;
            }
            else
            {
                
				echo '<script type = "text/javascript">
                            alert("Lecture Save Unsuccessfull! Please Try Again");
                        window.location = "schedule.php";
                     </script>
                    ';;
                    
            }
           
    }

if (isset($_POST['edit'])) { // if save button on the form is clicked
    // name of the uploaded file

        $batchNo = $_POST['batchNo'];
        $year = $_POST['year'];

        $sql = "UPDATE `batch` SET `year` = '$year' WHERE `batchNo` = '$batchNo'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Update Successfully!");
                        window.location = "history.back()";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("Update Failed");
                        window.location = "history.back()";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;

            }
}

if (isset($_POST['delete'])) 
{
        $batchNo = $_POST['batchNo'];

        $sql = "DELETE FROM batch WHERE batchNo = '$batchNo'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Delete Successfully!");
                        window.location = "history.back()";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("You Cannot Delete this");
                        window.location = "history.back()";
                     </script>
                    ';;
            }
}