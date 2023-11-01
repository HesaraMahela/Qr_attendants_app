<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $batchNo = $_POST['batchNo'];
        $degID = $_POST['degID'];
        $m_code = $_POST['m_code'];
        $enYear = $_POST['enYear'];

            $sql = "INSERT INTO enrollment (batchNo, degID, m_code, enYear) VALUES ('$batchNo','$degID','$m_code','$enYear')";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Data Inserted Successfully!");
                        window.location = "assign_modules.php";
                     </script>
                    ';;
            }
            else
            {
                
				echo '<script type = "text/javascript">
                            alert("This Data Already Inserted");
                        window.location = "assign_modules.php";
                     </script>
                    ';;
                    
            }
           
    }

if (isset($_POST['delete'])) 
{
        $batchNo = $_POST['batchNo'];
        $degID = $_POST['degID'];
        $m_code = $_POST['m_code'];

        $sql = "DELETE FROM enrollment WHERE batchNo = '$batchNo' AND degID = '$degID' AND m_code = '$m_code'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Delete Successfully!");
                        window.location = "assign_modules.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("You Cannot Delete this");
                        window.location = "assign_modules.php";
                     </script>
                    ';;
            }
}