<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $m_code = $_POST['m_code'];
        $m_name = $_POST['m_name'];
        $description = $_POST['description'];

        $char = strlen($description);

        if($char > 200)
        {
            echo '<script type = "text/javascript">
                            alert("Decription is Too Long!");
                        window.location = "add_modules.php";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;
        }
        else
        {
            $sql = "INSERT INTO module (m_code, m_name, description) VALUES ('$m_code','$m_name','$description')";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Data Inserted Successfully!");
                        window.location = "add_modules.php";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;
            }
            else
            {
                
				echo '<script type = "text/javascript">
                            alert("Data Inserted Failed! Please Try Again");
                        window.location = "add_modules.php";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;
                    
            }
        }
           
    }

if (isset($_POST['edit'])) { // if save button on the form is clicked
    // name of the uploaded file

    $m_code = $_POST['m_code'];
    $m_name = $_POST['m_name'];
    $description = $_POST['description'];

    $char = strlen($description);

        if($char > 200)
        {
            echo '<script type = "text/javascript">
                            alert("Decription is Too Long!");
                        window.location = "add_modules.php";
                     </script>
                    ';;
        }
        else
        {
            $sql = "UPDATE `module` SET `m_name` = '$m_name', `description` = '$description' WHERE `m_code` = '$m_code'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Update Successfully!");
                        window.location = "add_modules.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("Update Failed");
                        window.location = "add_modules.php";
                     </script>
                    ';;

                    //echo "Error: " . $sql . "<br>" . $conn->error;

            }
        }
}

if (isset($_POST['delete'])) 
{
        $m_code = $_POST['m_code'];

        $sql = "DELETE FROM module WHERE m_code = '$m_code'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Delete Successfully!");
                        window.location = "add_modules.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("You Cannot Delete this");
                        window.location = "add_modules.php";
                     </script>
                    ';;
            }
}