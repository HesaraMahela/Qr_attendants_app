<?php
// connect to the database
require_once 'conn.php';

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $uid = $_POST['user_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];

        $filename = $_FILES['img']['name'];

    // destination of the file on the server
    $destination = 'assets/img/profiles/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['img']['tmp_name'];
    $size = $_FILES['img']['size'];

    if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
        echo "You file extension must be .jpg, .jpeg or .png";
    } elseif ($_FILES['img']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte(5Mb)
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) 
        {
            $sql = "UPDATE `user` SET `firstname` = '$fname', `lastname` = '$lname', `username` = '$username', `img` = 'assets/img/profiles/$filename' WHERE `user_id` = '$uid'";
            if (mysqli_query($conn, $sql)) 
            {
                
                echo '<script type = "text/javascript">
                            alert("Update Successfully!");
                        window.location = "profile.php";
                     </script>
                    ';;
            }
            else
            {
                echo '<script type = "text/javascript">
                            alert("Update Failed");
                        window.location = "profile.php";
                     </script>
                    ';;
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

    $uid = $_POST['user_id'];
    $newpassword = md5($_POST['newpassword']);
    $conpassword = md5($_POST['conpassword']);

    $sql = "UPDATE `user` SET `password` = '$newpassword' WHERE `user_id` = '$uid'";
        
        if ($newpassword != $conpassword)
        {
            echo '<script type = "text/javascript">
            alert("Update Failed, Passwords are does not match");
            window.location = "profile.php";
            </script>';;
        }

        else if (mysqli_query($conn, $sql)) 
        {
                
            echo '<script type = "text/javascript">
            alert("Update Successfully!");
            window.location = "profile.php";
            </script>';;
            
        }
        else
        {
            echo '<script type = "text/javascript">
            alert("Update Failed");
            window.location = "profile.php";
            </script>';;
        }
}