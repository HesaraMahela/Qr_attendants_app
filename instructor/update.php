<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['edit'])) { // if save button on the form is clicked
    // name of the uploaded file

        $ins_id = $_POST['ins_id'];
        $firstname = $_POST['firstname'];
        $ins_username = $_POST['ins_username'];
        $m_code = $_POST['m_code'];

        $filename = $_FILES['imgPath']['name'];

    // destination of the file on the server
    $destination = 'assets/img/instructors/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['imgPath']['tmp_name'];
    $size = $_FILES['imgPath']['size'];

    if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
        echo "You file extension must be .jpg, .jpeg or .png";
    } elseif ($_FILES['imgPath']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte(5Mb)
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) 
        {
            $sql = "UPDATE `instructors` SET `firstname` = '$firstname',  `ins_username` = '$ins_username', `m_code` = '$m_code', `imgPath` = 'instructor/assets/img/instructors/$filename' WHERE `ins_id` = '$ins_id'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("File Upload Successfully!");
                        window.location = "profile-settings.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("Update Failed");
                            window.location = "profile-settings.php";
                        
                     </script>
                    ';;
                    //echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } 
        else 
        {
            echo "Failed to upload file.";
        }
    }
}

if (isset($_POST['change'])) 
{ // if save button on the form is clicked
    // name of the uploaded file

    $ins_id = $_POST['ins_id'];
    $newpassword = md5($_POST['newpassword']);
    $conpassword = md5($_POST['conpassword']);

    $sql = "UPDATE `instructors` SET `password` = '$newpassword' WHERE `ins_id` = '$ins_id'";
        
        if ($newpassword != $conpassword)
        {
            echo '<script type = "text/javascript">
            alert("Update Failed, Passwords are does not match");
            window.location = "change-password.php";
            </script>';;
        }

        else if (mysqli_query($conn, $sql)) 
        {
                
            echo '<script type = "text/javascript">
            alert("Update Successfully!");
            window.location = "logout.php";
            </script>';;
            
        }
        else
        {
            echo '<script type = "text/javascript">
            alert("Update Failed");
            window.location = "change-password.php";
            </script>';;
        }
}