<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $batchNo = $_POST['batchNo'];
        $year = $_POST['year'];

            $sql = "INSERT INTO batch (batchNo, year) VALUES ('$batchNo','$year')";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Data Inserted Successfully!");
                        window.location = "add_batch.php";
                     </script>
                    ';;
            }
            else
            {
                
				echo '<script type = "text/javascript">
                            alert("Data Inserted Failed! Please Try Again");
                        window.location = "add_batch.php";
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
                        window.location = "add_batch.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("Update Failed");
                        window.location = "add_batch.php";
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
                        window.location = "add_batch.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("You Cannot Delete this");
                        window.location = "add_batch.php";
                     </script>
                    ';;
            }
}