<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $degID = $_POST['degID'];
        $degName = $_POST['degName'];

            $sql = "INSERT INTO degree (degID, degName) VALUES ('$degID','$degName')";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Data Inserted Successfully!");
                        window.location = "add_programmes.php";
                     </script>
                    ';;
            }
            else
            {
                
				echo '<script type = "text/javascript">
                            alert("Data Inserted Failed! Please Try Again");
                        window.location = "add_programmes.php";
                     </script>
                    ';;
                    
            }
           
    }

if (isset($_POST['edit'])) { // if save button on the form is clicked
    // name of the uploaded file

        $degID = $_POST['degID'];
        $degName = $_POST['degName'];

        $sql = "UPDATE `degree` SET `degName` = '$degName' WHERE `degID` = '$degID'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Update Successfully!");
                        window.location = "add_programmes.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("Update Failed");
                        window.location = "add_programmes.php";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;

            }
}

if (isset($_POST['delete'])) 
{
        $degID = $_POST['degID'];

        $sql = "DELETE FROM degree WHERE degID = '$degID'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Delete Successfully!");
                        window.location = "add_programmes.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("You Cannot Delete this");
                        window.location = "add_programmes.php";
                     </script>
                    ';;
            }
}