<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $ins_id = $_POST['ins_id'];
        $firstname = $_POST['firstname'];
        $m_code = $_POST['m_code'];
        $ins_username = $_POST['ins_username'];
        $password = md5($_POST['password']);
        $imgPath = "C:";

            $sql = "INSERT INTO instructors (ins_id, firstname, ins_username, password, imgPath, m_code) VALUES ('$ins_id','$firstname','$ins_username','$password','$imgPath', '$m_code')";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Data Inserted Successfully!");
                        window.location = "add_lectures.php";
                     </script>
                    ';;
            }
            else
            {
                
				echo '<script type = "text/javascript">
                            alert("Data Inserted Failed! Please Try Again");
                        window.location = "add_lectures.php";
                     </script>
                    ';;
                    
            }
           
    }

if (isset($_POST['edit'])) { // if save button on the form is clicked
    // name of the uploaded file

        $ins_id = $_POST['ins_id'];
        $firstname = $_POST['firstname'];
        $m_code = $_POST['m_code'];
        $ins_username = $_POST['ins_username'];
        $password = md5($_POST['password']);

        $sql = "UPDATE `instructors` SET `firstname` = '$firstname', `ins_username` = '$ins_username', `password` = '$password', `m_code` = '$m_code' WHERE `ins_id` = '$ins_id'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Update Successfully!");
                        window.location = "add_lectures.php";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("Update Failed");
                        window.location = "add_lectures.php";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;

            }
}

if (isset($_POST['delete'])) 
{
        $ins_id = $_POST['ins_id'];

        $sql = "DELETE FROM instructors WHERE ins_id = '$ins_id'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Delete Successfully!");
                        window.location = "add_lectures.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("You Cannot Delete this");
                        window.location = "add_lectures.php";
                     </script>
                    ';;
            }
}