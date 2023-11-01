<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $st_no = $_POST['st_no'];
        $st_name = $_POST['st_name'];
        $batchNo = $_POST['batchNo'];
        $degID = $_POST['degID'];
        $st_username = $_POST['st_username'];
        $password = md5($_POST['password']);
        $imgPath = "C:";

            $sql = "INSERT INTO student (st_username, password, st_no, st_name, imgPath, batchNo, degID) VALUES ('$st_username','$password','$st_no','$st_name','$imgPath', '$batchNo', '$degID')";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Data Inserted Successfully!");
                        window.location = "add_students.php";
                     </script>
                    ';;
            }
            else
            {
                
				echo '<script type = "text/javascript">
                            alert("Data Inserted Failed! Please Try Again");
                        window.location = "add_students.php";
                     </script>
                    ';;
                    
            }
           
    }

if (isset($_POST['edit'])) { // if save button on the form is clicked
    // name of the uploaded file

        $st_username = $_POST['st_username'];
        $st_name = $_POST['st_name'];
        $batchNo = $_POST['batchNo'];
        $degName = $_POST['degName'];
        $password = md5($_POST['password']);

        $sql = "UPDATE `student` SET `st_name` = '$st_name', `batchNo` = '$batchNo', `degID` = '$degName', `password` = '$password' WHERE `st_username` = '$st_username'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Update Successfully!");
                        window.location = "add_students.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("Update Failed");
                        window.location = "add_students.php";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;

            }
}

if (isset($_POST['delete'])) 
{
        $st_username = $_POST['st_username'];

        $sql = "DELETE FROM student WHERE st_username = '$st_username'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Delete Successfully!");
                        window.location = "add_students.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("You Cannot Delete this");
                        window.location = "add_students.php";
                     </script>
                    ';;
            }
}